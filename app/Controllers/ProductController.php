<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NewsModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    
    private $layout;

    function __construct()
    {
        $this->layout = parent::layout();
    }

    public function index()
    {
        $model = new ProductModel(); // create 1 new instance of object
        $rows = $model->findAll();
        $page = 'product/list';
        $layouts = $this->layout;
        return view('layout/default', [
            'rows' => $rows,
            'page' => $page,
            'layout' => $layouts,
        ]);
        // return view('product/list', ['rows' => $rows]);
    }

    public function create()
    {
        $rows = false;
        $page = 'product/form';
        $layouts = $this->layout;
        return view('layout/default', [
            'rows' => $rows,
            'page' => $page,
            'layout' => $layouts,
        ]);
    }

    public function save()
    {
        $message = [
            'name' => [
                'required' => 'Nama wajib diisi',
            ],
            'desc' => [
                'required' => 'Description wajib diisi',
            ],
            'price' => [
                'required' => 'Harga wajib diisi',
            ],
        ];

        if($this->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required|integer',
        ], $message))
        {
            $model = new ProductModel(); // create 1 new instance of object
            $model->save($_POST);
            return redirect()->to('/product/list');
        }
        else
        {
            // dd($this->validator->getErrors()['name']);
            $rows = $_POST;
            return view('product/form', [
                'rows' => $rows,
                'validator' => $this->validator->getErrors(),
            ]);
        }
        // var_dump($_POST); die();
    }

    function edit()
    {
        $model = new ProductModel(); // create 1 new instance of object
        $rows = $model->find($_POST['id_product']);
        
        return view('product/form', ['rows' => $rows]);
        // dd($rows);
    }

    function delete()
    {
        // dd($_POST);
        $model = new ProductModel(); // create 1 new instance of object
        $model->delete($_POST['id_product']);
        return redirect()->to('/product/list');
    }

    
}
