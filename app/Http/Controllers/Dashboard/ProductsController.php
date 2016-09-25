<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Models\Brands;
use App\Models\Products;
use App\Models\ProductImages;
use App\Models\Categories;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class ProductsController extends Controller
{
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
            $form_data = $request->all();
            if (!empty($form_data['price_to_date'])) {
                $date_range_validation = '|before:' . $form_data['price_to_date'];
            } else {
                $date_range_validation = '';
            }
            $rule = [
                'category' => 'required',
                'brand' => 'required',
                'short_description' => 'max:255',
                'price' => 'numeric',
                'old_price' => 'numeric',
                'price_from_date' => 'date' . $date_range_validation,
                'price_to_date' => 'date',
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

            $validator = Validator::make($form_data, $rule);
            $path = 'uploads/images/products'; // path to product images directory
            $form_data = ['product' => $form_data['product'],
                'alias' => $form_data['alias'],
                'category_id' => $form_data['category'],
                'brand_id' => $form_data['brand'],
                'description' => $form_data['short_description'],
                'content' => $form_data['content'],
                'price' => $form_data['price'],
                'old_price' => $form_data['old_price'],
                'price_from_date' => $form_data['price_from_date'],
                'price_to_date' => $form_data['price_to_date'],
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
                $data_array = ['product' => $product['product'],
                    'alias' => $product['alias'],
                    'category_id' => $product['category'],
                    'brand_id' => $product['brand'],
                    'description' => $product['short_description'],
                    'content' => $product['content'],
                    'price' => $product['price'],
                    'old_price' => $product['old_price'],
                    'price_from_date' => $product['price_from_date'],
                    'price_to_date' => $product['price_to_date'],
                    'preview' => serialize($photos),
                    'count' => $product['count'],
                    'rating' => $product['rating']];
                foreach ($data_array as $key => $item) {
                    if(empty($item)){
                        $data_array[$key] = null;
                    }
                }
                Products::where('id', $id)->
                update($data_array); // update product row

                $message = trans('messages.Product') . ' ' . $product['product'] . ' ' . trans('messages.edited_succefully');
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
            $form_data = $request->all();
            if (!empty($form_data['price_to_date'])) {
                $date_range_validation = '|before:' . $form_data['price_to_date'];
            } else {
                $date_range_validation = '';
            }
            $rule = [
                'product' => 'required|unique:products|max:255',
                'alias' => 'required|unique:products|max:255',
                'category' => 'required',
                'brand' => 'required',
                'short_description' => 'max:255',
                'price' => 'numeric',
                'old_price' => 'numeric',
                'price_from_date' => 'date' . $date_range_validation,
                'price_to_date' => 'date',
                'count' => 'numeric',
                'photos.*.file' => 'image|max:1024'
            ];
            $validator = Validator::make($request->all(), $rule);

            $path = 'uploads/images/products';

            if (!$validator->fails()) {
                $photos = [];

                $product = $request->all();
                $data_array = ['product' => $product['product'],
                    'alias' => $product['alias'],
                    'category_id' => $product['category'],
                    'brand_id' => $product['brand'],
                    'description' => $product['short_description'],
                    'content' => $product['content'],
                    'price' => $product['price'],
                    'old_price' => $product['old_price'],
                    'price_from_date' => $product['price_from_date'],
                    'price_to_date' => $product['price_to_date'],
                    'preview' => '',
                    'count' => $product['count'],
                    'rating' => 0];
                foreach ($data_array as $key => $value) {
                    if (empty($value)) {
                        unset($data_array[$key]);
                    }
                }
                $result = Products::create($data_array);

                if (!is_null($request->photos[0])) {
                    foreach ($request->photos as $photo) {
                        $filename = $form_data['product'] . md5(time() . rand(1, 999)) . '.' . $photo->extension();
                        $img_result = ProductImages::create(['image' => $filename, 'product_id' => $result->id]);
                        $photos[] = $filename;
                        $photo->move($path, $filename);
                    }
                    Products::where('id', $result->id)->update(['preview' => $img_result->id]);
                }

                $message = trans('messages.Product') . ' ' . $product['product'] . ' ' . trans('messages.succeffully_added');
                $message_type = 'success';
                $form_data = '';
            } else {
                $message = $validator->errors()->all();
                $message_type = 'danger';
            }
            return view('dashboard.add_product', ['form_data' => $form_data, 'type' => $message_type, 'message' => $message, 'categories' => Categories::all(), 'brands' => Brands::all()]);
        }
    }

    public function deleteProduct(Request $request)// ajax delete
    {
        $query = Products::where('id', $request->all()['id'])->delete();
        if ($query) {
            return response()->json(['message' => trans('messages.Product') . ' ' . $request->all()['product'] . ' ' . trans('messages.succeffully_deleted') . '!', 'result' => 'success']);
        } else {
            return response()->json(['message' => "Error!", 'result' => 'danger']);
        }
    }

    public function showAllBrands()
    {
        return view('dashboard.brands', ['brands' => Brands::all()]);
    }

    public function addBrand(Request $request)
    {
        $form_data = $request->all();
        if (empty($form_data)) {
            return view('dashboard.add_brand');
        } else {
            $rule = [
                'brand' => 'required|unique:brands|max:255',
                'alias' => 'required|unique:brands|max:255',
                'logo' => 'image|max:512'
            ];
            $validator = Validator::make($request->all(), $rule);
            $path = 'uploads/images/brands';
            if (!$validator->fails()) {
                $filename = '';
                if (!is_null($request->logo)) {
                    $filename = $form_data['alias'] . '.' . $request->logo->extension();
                    $request->logo->move($path, $filename);
                }
                $message = trans('messages.Brand') . ' ' . $form_data['brand'] . ' ' . trans('messages.succeffully_added');
                Brands::create(['brand' => $form_data['brand'], 'alias' => $form_data['alias'], 'logo' => $filename]);
                return view('dashboard.add_brand', ['form_data' => $form_data, 'message' => $message, 'type' => 'success']);
            } else {
                $message = $validator->errors()->all();
                return view('dashboard.add_brand', ['form_data' => $form_data, 'message' => $message, 'type' => 'danger']);
            }
        }
    }
}
