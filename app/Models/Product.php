<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $primaryKey = 'code';
    protected $fillable = [ 'code', 'name', 'description', 'stock', 'price', 'discontinued'];

    private $types = ['string', 'string', 'string', 'int', 'float', 'bool'];

    public function getMappings() {
        return $this->fillable;
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
            $row[$key] = typeFormat($row[$key], $this->types[$key]); //defined in App\helpers.php
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
