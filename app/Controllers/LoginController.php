<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    private $layout;
    private $model;
    protected $session;

    function __construct() 
    {
        $this->layout = parent::layout_login();
        $this->model = model('UserModel');
        $this->session = session();
        helper('form');
    }

    public function index()
    {
        //
        // $rows = false;
        $page = 'login/form';
        $layouts = $this->layout;
        return view('layout/default', [
            'page' => $page,
            'layout' => $layouts,
            // 'rows' => $rows,
        ]);
    }

    function auth()
    {
        $rows = $this->model->where('email', $_POST['email'])->first();
        if($rows)
        {
            // var_dump($_POST['password']);
            // $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // // dd($_POST['password']);
            // var_dump($_POST['password']);
            // var_dump($rows['password']);
            // die();
            if(password_verify($_POST['password'],$rows['password']))
            {
                $data = array(
                    'email' => $rows['email'],
                    'isLoggedIn' => true,
                );
                $this->session->set($data);
                return redirect()->to('/product/list');
            }
            else
            {
                $this->session->setFlashdata('msg', 'Salah Credential!');
                // return redirect()->back()->withInput();
                return redirect()->to('/login/index')->withInput();
            }
        }
        else
        {
            $this->session->setFlashdata('msg', 'Salah Credential!');
            return redirect()->back()->withInput();
        }
        // dd($rows);

    }

    function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login/index');
    }
}
