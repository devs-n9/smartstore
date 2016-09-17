<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
  public function index()
    {
    return view('dashboard.news.index');
    
//        $news = News::all();//выводит все записи
//        return view('dashboard.news.index', [
//            'news' => $news
//        ]);
    }
        
    public function create()
    {
        return view('dashboard.news.posts.create');
    }
    
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'unique:news|required'
        ]);
        
        if (!$validator->fails()) {
            $data = $request->all();
            News::create($data);

            return redirect('/dashboard');
        }else{
            
            return view('dashboard.news.posts.create', [
                'errors' => $validator->errors()->all()
            ]);
        }
        
    }
    
    public function edit($id)
    {
        $news = News::find($id);
        return view('dashboard.news.posts.edit', [
            'news' => $news
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $news = News::find($id);
        $news->update($data);
        return redirect('/dashboard');
    }
    
    public function delete($title)
    {
        $news = News::where('title', $title)->delete();
        return redirect('/dashboard');
    }
}
