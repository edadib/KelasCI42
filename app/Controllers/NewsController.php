<?php

namespace App\Controllers;

use App\Models\NewsModel;

class NewsController extends BaseController {
    
    public function index()
    {
        $model = new NewsModel();
    }

    public function news()
    {
        echo "masuk";
    }

    public function create()
    {
        return view('/news/form');
    }

    public function save()
    {
        echo "save data";
    }
    
}