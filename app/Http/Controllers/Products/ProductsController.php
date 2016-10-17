<?php

namespace App\Http\Controllers\Products;

use App\Models\Categories;
use App\Models\ProductImages;
use App\Models\Products;
use App\Models\Reviews;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class ProductsController extends Controller
{
    // Catalog - categories page
    public function catalog()
    {
        $categories = Categories::paginate(6);
        return view('products.catalog', ['categories'=>$categories]);
    }

    // Category - products list
    public function category($alias)
    {
        $category = Categories::where('alias', $alias)->first();
        $category_products = Products::where('category_id', $category['id'])->paginate(6);
        $categories = Categories::all();
        return view('products.category', ['categories'=>$categories,'category'=>$category,'category_products'=>$category_products]);
    }

    // Product detail
    public function product($alias, Request $request)
    {
        // Get product
        $product = Products::all()->where('alias', $alias)->first();
        $productId = $product->id;

        // Set review
        if($request){
            $validator = Validator::make($request->all(), [
              "review" => "required"
            ]);
            $data = $request->all();
            if ( !$validator->fails() ) {
                // Create review & save
                $review = new Reviews();
                $review->review = $data["review"];
                $review->product_id = $productId;
                $review->rating = $data["rating"];
                $review->user_id = Auth::user()->id;
                // Work with image
                if($request->hasFile("avatar")){
                    $file = $request->file("avatar");
                    $fileName = md5(time() . rand(1, 999)) . '.' . $file->extension();
                    $uploadPath = base_path() . '\public\uploads\images\reviews';
                    $file->move($uploadPath, $fileName);
                    $review->avatar = $fileName;
                }
                $review->save();
            } else {
//                return back()->withErrors($validator);
            }
        }

        // Get product
        $images = ProductImages::all()->where('product_id', $productId);
        $products = Products::all();
        $categories = Categories::all();
        $product_category = $categories->where('id', $product['category_id'])->first();

        // Get product reviews
        $product_reviews = DB::table('reviews')
          ->join('users', function ($join) use ($productId) {
              $join->on('users.id', '=', 'reviews.user_id')
                ->where('reviews.product_id', '=', $productId)
                ->where('reviews.publish', '=', 1);
          })
          ->join('profile', 'profile.user_id', '=', 'reviews.user_id')
          ->get();
        $product_rating = Reviews::where('product_id', $productId)->where('publish', '=', 1)->select('rating')->get();
        $product_rating_total = 0;
        $product_rating_count = 0;
        for($i=0;$i<count($product_rating);$i++){
            $product_rating_total += $product_rating[$i]['rating'];
            if($product_rating[$i]['rating'] > 0){
                $product_rating_count++;
            }
        }
        if($product_rating_total > 0 && $product_rating_count > 0){
            $product_rating_average = round($product_rating_total / $product_rating_count);
        } else {
            $product_rating_average = 0;
        }

        return view('products.product',
            [
                'product'=>$product,
                'categories'=>$categories,
                'products'=>$products,
                'product_category'=>$product_category,
                'images'=>$images,
                'product_reviews'=>$product_reviews,
                'product_rating'=>$product_rating_average,
                'product_rating_count'=>$product_rating_count
            ]
        );
    }
}
