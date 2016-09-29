<?php

namespace App\Http\Controllers\Dashboard;
use Validator;
use App\Models\News\News;
use App\Models\NewsCategories;
use App\Models\NewsImages;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {

        $news = News::all();
        return view('dashboard.news.index', [
            'news' => $news
        ]);
    }

    public function create()
    {
        $newscategories = NewsCategories::all();
        return view('dashboard.news.create', [
            'newscategories' => $newscategories
        ]);
    }

    public function insert(Request $request)
    {
        $newscategories = [];
        $newscategory = [];
        $validator = Validator::make($request->all(), [
            'title' => 'unique:news|required'
        ]);



        if (!$validator->fails()) {
            $data = $request->all();

            $newscategories = $data['newscategories'];

            unset($data['newscategories']);

            $n = News::create($data);

            foreach($newscategories as $k => $newscat){
                $newscategory[$k]['newscategory_id'] = $newscat;
                $newscategory[$k]['n_id'] = $n->id;
            }

            Newscategories::insert($newscategory);
            return redirect('/dashboard/news');
        }else{

            return view('dashboard.news.create', [
                'errors' => $validator->errors()->all()
            ]);
        }

    }

    public function edit($id)
    {
        $n = News::find($id);
        $newscategories = NewsCategories::all();
        return view('dashboard.news.edit', [
            'news' => $n,
            'newscategories' => $newscategories
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
