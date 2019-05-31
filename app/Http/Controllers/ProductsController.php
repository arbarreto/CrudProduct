<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategorieModel;
use App\newProduct;

class ProductsController extends Controller {
    
    public function newProduct() {
    	$categories = CategorieModel::get();
    	return view('new', compact('categories'));
    }

    public function listProduct() {
    	$products = newProduct::get();
    	$categories = CategorieModel::get();

    	return view('products', compact('products', 'categories'));
    }

    public function createProduct(Request $request) {
    	$data = $request->all();

    	$ImageName = $_FILES['image']['name'];
		$fileElementName = 'image';
		$path = 'img/'; 
		$location = $path . $_FILES['image']['name']; 
		move_uploaded_file($_FILES['image']['tmp_name'], $location);

        $product = newProduct::create([
        	'name'         => $data['name'],
        	'category_id'  => $data['category'],
        	'description'  => $data['description'],
        	'image'        => $location,
        	'color'        => json_encode($data['color']),
        	'size'         => json_encode($data['size'])
        ]);

        return redirect('/list');

    }

    public function deleteProduct($id) {
    	$product = newProduct::where('id', $id)->first();
    	$product->delete();

    	return redirect('/list');
    }

    public function editProduct($id) {
    	$editProduct = newProduct::where('id', $id)->first();
    	$categories = CategorieModel::get();
    	return view('new', compact('editProduct', 'categories'));
    }

    public function updateProduct($id, Request $request) {
    	$data = $request->all();
    	$product = newProduct::where('id', $id)->first();
    	if(array_key_exists('image', $data)) {
    		$ImageName = $_FILES['image']['name'];
			$fileElementName = 'image';
			$path = 'img/'; 
			$location = $path . $_FILES['image']['name']; 
			move_uploaded_file($_FILES['image']['tmp_name'], $location);
			
			$product->image = $location;
			$product->save();
    	}

    	$product->name        = $data['name'];
    	$product->category_id = $data['category'];
    	$product->description = $data['description'];
    	$product->color       = json_encode($data['color']);
    	$product->size        = json_encode($data['size']);

    	$product->save();

    	return redirect('/list');
    }
}
