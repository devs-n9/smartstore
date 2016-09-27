<?php

namespace App\Http\Controllers\Dashboard\DashboardNewsController;
use Validator;
use App\Models\News\News;
use App\Models\News\Categories;
use App\Models\News\Newscategories;
use App\Models\News\NewsImages;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class DashboardNewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {

        $news = News::all();
        return view('dashboard.news.posts.index', [
            'news' => $news
        ]);
    }

    public function create()
    {
        $categories = Categories::all();
        return view('dashboard.news.posts.create', [
            'categories' => $categories
        ]);
    }

    public function insert(Request $request)
    {
        $categories = [];
        $category = [];
        $validator = Validator::make($request->all(), [
            'title' => 'unique:news|required'
        ]);



        if (!$validator->fails()) {
            $data = $request->all();

            $categories = $data['categories'];

            unset($data['categories']);

            $n = News::create($data);

            foreach($categories as $k => $cat){
                $category[$k]['category_id'] = $cat;
                $category[$k]['n_id'] = $n->id;
            }

            Newscategories::insert($category);
            return redirect('/dashboard/news');
        }else{

            return view('dashboard.news.posts.create', [
                'errors' => $validator->errors()->all()
            ]);
        }

    }

    public function edit($id)
    {
        $n = News::find($id);
        $categories = Categories::all();
        return view('dashboard.news.posts.edit', [
            'news' => $n,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $n = News::find($id);
        $n->update($data);
        return redirect('/dashboard/news');
    }

    public function delete($title)
    {
        return redirect('/dashboard/news');
    }
}
