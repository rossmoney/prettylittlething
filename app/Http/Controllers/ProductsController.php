<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\CSV;
use App\Models\Product;

class ProductsController extends Controller {

    private $inserted = 0;
    private $alreadyInserted = 0;
    private $productArr = [];

    public function importProducts($filename)
    {
        $file = public_path($filename);
        $csv = new CSV;

        $productModel = new Product();
        $csv->setHeaderRow($productModel->getMappings());

        $this->productArr = $csv->toArray($file, $productModel); //custom field mappings and data types passed

        if($this->productArr) {
            $this->dedupeAndInsertProducts();

            return $this->inserted . ' products were imported. ' . "\r\n" . 
                   $this->alreadyInserted . " products were already imported.\r\n" .
                   $csv->getInvalidProductCount() . " products were exported incorrectly and couldn't be imported.";
        }

        return 'CSV file /public/' . $filename . ' could not be found';
    }

    public function setProductArray($productArr) {
        $this->productArr = $productArr;
        return $this->productArr;
    }

    public function dedupeAndInsertProducts() {
        for ($i = 0; $i < count($this->productArr); $i ++)
        {
            $exists = Product::query();
            foreach($this->productArr[$i] as $key => $value) { //dedupe products, laravels built in updateOrCreate doesn't seem to work
                $exists->where($key, 'LIKE', '%'. $value. '%');
            }
            if($exists->first() == null) {
                Product::updateOrCreate($this->productArr[$i]);
                $this->inserted++;
            } else {
                $this->alreadyInserted++;
            }
        }
    }

    public function processCSVRow($csv, $row) {
        
        $data = $csv->getRowData();
        $invalids = $csv->getInvalidProductCount();
        $discard = false;
        $header = $csv->getHeaderRow();

        $diff = count($header) - count($row);
        $amount = abs($diff);
        if($diff < 0) {
            $row = array_slice($row, 0, count($header));
        } else {
            $row = array_pad($row, count($header), null);
        }
        $row = preg_replace('/\$|£/', '', $row); //format and sanitize data
        foreach($row as $key=>$value) {
            if($row[$key] == 'error in export') $discard = true;
            $row[$key] = typeFormat($row, $this->types, $key); //defined in App\helpers.php
        }
        if($discard) {
            $invalids++;
            $csv->setInvalidProductCount($invalids);
            return $data;
        }
        $data[] = array_combine($header, $row);
        return $data;
    }
    
}