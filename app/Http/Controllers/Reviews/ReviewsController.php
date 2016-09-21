<?php

namespace App\Http\Controllers\Reviews;

use Illuminate\Http\Request;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class ReviewsController extends Controller
{
    public function addReview($alias, Request $request)
    {
        if (empty($request->all())) {
            return view('products.product', ['type' => '', 'message' => '']);
        } else {
            $form_data = $request->all();

            $rule = [
                'name' => 'required|unique:products|max:255',
                'review' => 'max:255',
                'review.*.file' => 'image|max:1024'
            ];
            $validator = Validator::make($request->all(), $rule);

            $path = 'uploads/images/reviews';

            if (!$validator->fails()) {
                $avatar = null;
                if (!is_null($request->avatar)) {
                    $filename = md5(time() . rand(1, 999)) . '.' . $avatar->extension();
                    $avatar->move($path, $filename);
                }

                $review = $request->all();
                $data_array = [
                    'name' => $review['name'],
                    'review' => $review['review'],
                    'avatar' => $avatar
                ];
                foreach ($data_array as $key => $value) {
                    if (empty($value)) {
                        unset($data_array[$key]);
                    }
                }
                Reviews::insert($data_array);

//                $message = trans('messages.Product') . ' ' . $review['name'] . ' ' . trans('messages.succeffuly_added');
                $message = "fdfs";
                $message_type = 'success';
                $form_data = '';
            } else {
                $message = $validator->errors()->all();
                $message_type = 'danger';
            }

            $product = Products::all()->where('alias', $alias)->first();
            $images = ProductImages::all()->where('product_id', $product->id);
            $products = Products::all();
            $categories = Categories::all();
            $product_category = $categories->where('id', $product['category_id'])->first();
            return view('products.product',
                [
                    'product'=>$product,
                    'categories'=>$categories,
                    'products'=>$products,
                    'product_category'=>$product_category,
                    'images'=>$images,
                    'type' => $message_type,
                    'message' => $message
                ]
            );
        }
    }
}
