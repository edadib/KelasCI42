<?php

namespace App\Controllers;

use App\Models\NewsModel;

class NewsController extends BaseController {
    
    public function index()
    {
        $model = new NewsModel();
    }
    
}