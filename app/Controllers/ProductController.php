<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NewsModel;
// use App\Models\ProductModel;

class ProductController extends BaseController
{
    
    private $layout;
    protected $model;

    function __construct()
    {
        $this->layout = parent::layout();
        $this->model = model('ProductModel');
        helper('form');
    }

    public function index()
    {
        // $model = new ProductModel(); // create 1 new instance of object
        $rows = $this->model->findAll();
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
                'required' => $this->model->getValidationMessages()['name']['required'],
            ],
            'desc' => [
                'required' => $this->model->getValidationMessages()['desc']['required'],
            ],
            'price' => [
                'required' => $this->model->getValidationMessages()['price']['required'],
            ],
        ];

        if($this->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required|integer',
        ], $message))
        // if($this->model->save($_POST))
        // if($this->model->validate($_POST))
        {
            // $model = new ProductModel(); // create 1 new instance of object
            $this->model->save($_POST);
            return redirect()->to('/product/list');
        }
        else
        {
            // dd($this->validator->getErrors()['name']);
            $rows = $_POST;
            $page = 'product/form';
            $layouts = $this->layout;
            return view('layout/default', [
                'rows' => $rows,
                'page' => $page,
                'layout' => $layouts,
                'validator' => $this->validator->getErrors(),
            ]);
        }
        // var_dump($_POST); die();
    }

    function edit()
    {
        // $model = new ProductModel(); // create 1 new instance of object
        $rows = $this->model->find($_POST['id_product']);
        
        $page = 'product/form';
        $layouts = $this->layout;
        return view('layout/default', [
            'rows' => $rows,
            'page' => $page,
            'layout' => $layouts,
        ]);
        // dd($rows);
    }

    function delete()
    {
        // dd($_POST);
        // $model = new ProductModel(); // create 1 new instance of object
        $this->model->delete($_POST['id_product']);
        return redirect()->to('/product/list');
    }

    
}
