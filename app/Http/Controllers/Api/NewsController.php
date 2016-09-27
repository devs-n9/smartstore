<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\News;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    public function getAllNews()
    {
        return response()->json(News::AllNews());
    }

    public function getTop10()
    {
        return response()->json(News::getTop10());
    }
    public function test(){
        $news = News::all();
        foreach ($news as $n){
            dd($n->images);
        }
    }
}

