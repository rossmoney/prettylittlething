<?php
// File: app/Helpers/Products.php

namespace App\Helpers;

use App\Models\Product;

class Products
{
    public static function importProducts()
    {
        $file = public_path('stock.csv');

        list($productArr, $invalid) = csvToArray($file, Product::$types, Product::$mappings); //custom field mappings and data types passed

        if($productArr) {

            //dd($productArr);
            //\DB::enableQueryLog();

            $inserted = $alreadyInserted = 0;

            for ($i = 0; $i < count($productArr); $i ++)
            {
                $exists = Product::query();
                foreach($productArr[$i] as $key => $value) { //dedupe products, laravels built in updateOrCreate doesn't seem to work
                    $exists->where($key, 'LIKE', '%'. $value. '%');
                }
                if($exists->first() == null) {
                    Product::updateOrCreate($productArr[$i]);
                    $inserted++;
                } else {
                    $alreadyInserted++;
                }
            }

            //dd(\DB::getQueryLog());

            return $inserted . ' products were imported. ' . "\r\n" . 
                   $alreadyInserted . " products were already imported.\r\n" .
                   $invalid . " products were exported incorrectly and couldn't be imported.";
        }

        return 'CSV file /public/stock.csv could not be found';
    }
}