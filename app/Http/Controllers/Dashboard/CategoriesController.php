<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Validator;

class CategoriesController extends Controller
{
    public function ShowAllCategories()
    {
        $categories = Categories::orderBy('id')->paginate(10);
        return view('dashboard.categories', ['categories' => $categories]);
    }

   public function addCategoryPage()
   {
       return view('dashboard.add_category');
   }

   public function addCategory(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'category' => 'required|unique:categories|max:50',
           'alias' => 'required|unique:categories|max:50',
           'description' => 'required|unique:categories|max:255',
           'content' => 'required',
           'preview' => 'required'
           ]);

       if (!$validator->fails()) {

            $data = $request->all();

           Categories::insert([
               'category' => $data['category'],
               'alias' => $data['alias'],
               'description' => $data['description'],
               'content' => $data['content'],
               'preview' => $data['preview']

            ]);
           return redirect('/dashboard/categories/all');
        } else {
           [
               'errors' => $validator->errors()->all()
           ];

       }
        return view('dashboard.add_category');
    }

    public function editCategory($id)
    {

    $category = Categories::find($id);
//        {{dd($category);}}

    return view('dashboard.edit_category', [
        'category' => $category['category'],
        'alias' => $category['alias'],
        'desc' => $category['description'],
        'content' => $category['content'],
        'preview' => $category['preview']

        ]);
    }

    public function updateCategory (Request $request, $id)
    {

     $data = $request->all();
     $category = Categories::find($id);
     $category->update($data);

    return redirect('/dashboard/categories/all');

    }


    public function deleteCategory($id)

    {
        Categories::where('id',$id)->delete();
        return redirect('/dashboard/categories/all');
  }


}
