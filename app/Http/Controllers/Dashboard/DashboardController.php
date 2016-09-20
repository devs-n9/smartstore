<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

use App\Models\Products;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function ShowAllProducts()
    {
        $products = Products::orderBy('id', 'DESC')->get();
        return view('dashboard.products', ['products' => $products]);
    }

    public function editProduct(Request $request, $id)
    {
        if (empty($request->all())) {
            $product = new Products();
            $form_data = $product->getProduct($id)[0]->toArray();
            return view('dashboard.edit_product', ['type' => '', 'message' => '', 'form_data' => $form_data, 'categories' => Categories::all(), 'brands' => Brands::all()]);
        } else {
            $old_product = Products::where('id', $id)->get(['product', 'alias']);
            $rule = [
                'category' => 'required',
                'brand' => 'required',
                'short_description' => 'max:255',
                'price' => 'numeric',
                'count' => 'numeric',
                'photos.*.file' => 'image|max:1024',
                'rating' => 'numeric'
            ];
            if ($old_product[0]->product != $request->all()['product']) { //if product name changed add unique name validation
                $rule['product'] = 'required|unique:products|max:255';
            }
            if ($old_product[0]->alias != $request->all()['alias']) { //if alias changed add unique name validation
                $rule['alias'] = 'required|unique:products|max:255';
            }
            $validator = Validator::make($request->all(), $rule);
            $path = 'uploads/images/product'; // path to product images directory
            $form_data = $request->all();
            $form_data = ['product' => $form_data['product'],
                'alias' => $form_data['alias'],
                'category_id' => $form_data['category'],
                'brand_id' => $form_data['brand'],
                'description' => $form_data['short_description'],
                'content' => $form_data['content'],
                'price' => $form_data['price'],
                'count' => $form_data['count'],
                'rating' => $form_data['rating']]; //array keys rename for fill form fields

            if (!$validator->fails()) {
                $photos = [];
                if (!is_null($request->photos[0])) { // if we have one or more photos upload and write to db this
                    foreach ($request->photos as $photo) {
                        $filename = md5(time() . rand(1, 999)) . '.' . $photo->extension(); // filename generate
                        $photos[] = $filename;
                        $photo->move($path, $filename); // move image to fs
                    }
                }

                $product = $request->all();

                Products::where('id', $id)->
                update(['product' => $product['product'],
                    'alias' => $product['alias'],
                    'category_id' => $product['category'],
                    'brand_id' => $product['brand'],
                    'description' => $product['short_description'],
                    'content' => $product['content'],
                    'price' => $product['price'],
                    'preview' => serialize($photos),
                    'count' => $product['count'],
                    'rating' => $product['rating']]); // update product row

                $message = "Product {$product['product']} edited successfully";
                $message_type = 'success';
            } else {
                $message = $validator->errors()->all();
                $message_type = 'danger';
            }
            return view('dashboard.edit_product', ['type' => $message_type, 'message' => $message, 'form_data' => $form_data, 'categories' => Categories::all(), 'brands' => Brands::all()]);
        }
    }

    public function addProduct(Request $request)
    {
        if (empty($request->all())) {
            return view('dashboard.add_product', ['type' => '', 'message' => '', 'categories' => Categories::all(), 'brands' => Brands::all()]);
        } else {
            $rule = [
                'product' => 'required|unique:products|max:255',
                'alias' => 'required|unique:products|max:255',
                'category' => 'required',
                'brand' => 'required',
                'short_description' => 'max:255',
                'price' => 'numeric',
                'count' => 'numeric',
                'photos.*.file' => 'image|max:1024'
            ];
            $validator = Validator::make($request->all(), $rule);

            $path = 'uploads/images/product';
            $form_data = '';

            if (!$validator->fails()) {
                $photos = [];
                if (!is_null($request->photos[0])) {
                    foreach ($request->photos as $photo) {
                        $filename = md5(time() . rand(1, 999)) . '.' . $photo->extension();
                        $photos[] = $filename;
                        $photo->move($path, $filename);
                    }
                }

                $product = $request->all();

                Products::insert(['product' => $product['product'],
                    'alias' => $product['alias'],
                    'category_id' => $product['category'],
                    'brand_id' => $product['brand'],
                    'description' => $product['short_description'],
                    'content' => $product['content'],
                    'price' => $product['price'],
                    'preview' => serialize($photos),
                    'count' => $product['count'],
                    'rating' => 0]);

                $message = 'Product added successfully';
                $message_type = 'success';
            } else {
                $message = $validator->errors()->all();
                $message_type = 'danger';
                $form_data = $request->all();
            }
            return view('dashboard.add_product', ['form_data' => $form_data, 'type' => $message_type, 'message' => $message, 'categories' => Categories::all(), 'brands' => Brands::all()]);
        }
    }

    public function deleteProduct(Request $request)// ajax delete
    {
        $query = Products::where('id', $request->all()['id'])->delete();
        if ($query) {
            return response()->json(['message' => "Product " . $request->all()['product'] . " successfully deleted!", 'result' => 'success']);
        } else {
            return response()->json(['message' => "Error!", 'result' => 'danger']);
        }
    }

    public function showAllBrands()
    {
        return view('dashboard.brands', ['brands' => Brands::all()]);
    }
}
