<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NewsModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        //
        $model = new ProductModel(); // create 1 new instance of object
        $rows = $model->findAll();
        return view('product/list', ['rows' => $rows]);
    }

    public function create()
    {
        return view('product/form');
    }

    public function save()
    {
        // dd($_POST); 
        $model = new ProductModel(); // create 1 new instance of object
        $model->save($_POST);
        return redirect()->to('/product/list');
        // var_dump($_POST); die();
    }
}
