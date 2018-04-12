<?php
namespace App\Http\Controllers;

use Input;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\ListsRequest;
use App\Lists;
use App\Models\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Products extends Controller {

    public function index()
    {
        // $list_items = Lists::all();
        $products = Product::all();

        return view('products.list', compact('products'));
    }

    public function store(Requests\ListsRequest $request)
    {
        $input = $request->input();
        Lists::create($input);

        if (Input::hasFile('name'))
        {

            $file = Input::file('name');
            $name = time() . '-' . $file->getClientOriginalName();

            $path = storage_path('documents');

            $file->move($path, $name);

            // All works up to here
            // All I need now is to create an array
            // from the CSV and insert into the customers database
        }
    }
}