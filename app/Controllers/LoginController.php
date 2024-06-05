<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    private $layout;
    private $model;

    function __construct() 
    {
        $this->layout = parent::layout_login();
        $this->model = model('UserModel');
        helper('form');
    }

    public function index()
    {
        //
        $rows = false;
        $page = 'login/form';
        $layouts = $this->layout;
        return view('layout/default', [
            'page' => $page,
            'layout' => $layouts,
            'rows' => $rows,
        ]);
    }

    function auth()
    {
        $rows = $this->model->find($_POST['email']);
    }

    function logout()
    {

    }
}
