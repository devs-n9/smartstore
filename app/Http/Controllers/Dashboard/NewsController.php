<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\News;
use Validator;

class NewsController extends Controller
{
    public function showAllNews()
    {
        $news = News::orderBy('id')->get();
        return view('dashboard.news', ['news' => $news]);
    }
    public function addNews(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'title' => 'required|unique:news|max:50',
        'alias' => 'required|unique:news|max:50',
        'description' => 'required|unique:news|max:255',
        'content' => 'required',
        'preview' => 'required'
    ]);

    if (!$validator->fails()) {

        $data = $request->all();

        News::insert([
            'title' => $data['title'],
            'alias' => $data['alias'],
            'description' => $data['description'],
            'content' => $data['content'],
            'preview' => $data['preview'],
            'created_at' => $data['created_at']

        ]);
        return redirect('/dashboard/news/all');
    } else {
        [
            'errors' => $validator->errors()->all()
        ];

    }
    return view('dashboard.add_news');
}

    public function editNews($id)
    {

        $news_one = News::find($id);
//        {{dd($category);}}

        return view('dashboard.edit_news', [
            'title' => $news_one['title'],
            'alias' => $news_one['alias'],
            'desc' => $news_one['description'],
            'content' => $news_one['content'],
            'preview' => $news_one['preview'],
            'updated_at' => $news_one['updated_at']
        ]);
    }

    public function updateNews (Request $request, $id)
    {

        $data = $request->all();
        $news_one = News::find($id);
        $news_one->update($data);

        return redirect('/dashboard/news/all');

    }


}
