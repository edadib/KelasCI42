<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
// use App\Models\UserModel;

class UserController extends BaseController
{
    private $layout;
    private $model;

    function __construct()
    {
        $this->layout = parent::layout();
        $this->model = model('UserModel');
    }

    public function index()
    {
         // create 1 new instance of object
        $rows = $this->model->findAll();
        // $rows = $this->model->paginate(2);
        // $pager = $this->model->pager;
        $page = 'user/list';
        $layouts = $this->layout;
        return view('layout/default', [
            'rows' => $rows,
            'page' => $page,
            'layout' => $layouts,
        ]);
        
            //'pager' => $pager,
    }

    public function create()
    {
        $rows = false;
        $page = 'user/form';
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
            'email' => [
                'required' => 'Email wajib diisi',
            ],
            'password' => [
                'required' => 'Password wajib diisi',
            ],
        ];

        if($this->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|integer',
        ], $message))
        {
            // $model = new ProductModel(); // create 1 new instance of object
            $this->model->save($_POST);
            return redirect()->to('/user/list');
        }
        else
        {
            // dd($this->validator->getErrors()['name']);
            $rows = $_POST;
            $page = 'user/form';
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
    { // create 1 new instance of object
        $rows = $this->model->find($_POST['id']);
        $page = 'user/form';
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
        // dd($_POST); // create 1 new instance of object
        $this->model->delete($_POST['id']);
        return redirect()->to('/user/list');
    }
}
