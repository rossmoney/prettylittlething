<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Helpers\CSV;
use App\Models\Product;
use App\Http\Controllers\ProductsController;

class ImportProductsTest extends TestCase
{
    use RefreshDatabase;

    public function testNoCustomHeaderRow() {
        $file = public_path('stock.csv');
        $csv = new CSV;

        $productModel = new Product();
        //$csv->setHeaderRow($productModel->getMappings());

        $productArr = $csv->toArray($file, $productModel);

        $this->assertEquals(28, count($productArr));
    }

    public function testDBFieldsHeaderRow() {
        $file = public_path('stock.csv');
        $csv = new CSV;

        $productModel = new Product();
        $csv->setHeaderRow($productModel->getMappings());

        $productArr = $csv->toArray($file, $productModel);
        
        $this->assertEquals(28, count($productArr));
    }

    public function testInsertion() {
        $file = public_path('stock.csv');
        $csv = new CSV;

        $productModel = new Product();
        $csv->setHeaderRow($productModel->getMappings());

        $productArr = $csv->toArray($file, $productModel);

        $productsController = new ProductsController;
        $productsController->setProductArray($productArr);

        $productsController->dedupeAndInsertProducts();

        $products = Product::all();
        $this->assertEquals(27, count($products));
    }
}