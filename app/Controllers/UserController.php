<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;

// use App\Models\UserModel;

class UserController extends BaseController
{
    private $layout;
    private $model;
    protected $session;

    function __construct()
    {
        $this->layout = parent::layout();
        $this->model = model('UserModel');
        $this->session = session();
        helper(['form', 'utility']);
    }

    public function index()
    {
        // echo sumof(1,2);
        // dd();
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
        // $message = [
        //     'name' => [
        //         'required' => 'Nama wajib diisi',
        //     ],
        //     'email' => [
        //         'required' => 'Email wajib diisi',
        //     ],
        //     'password' => [
        //         'required' => 'Password wajib diisi',
        //     ],
        // ];
        

        $message = [
            'name' => [
                'required' => $this->model->getValidationMessages()['name']['required'],
                'alpha' => $this->model->getValidationMessages()['name']['alpha'],
            ],
            'email' => [
                'required' => $this->model->getValidationMessages()['email']['required'],
            ],
            'password' => [
                'required' => $this->model->getValidationMessages()['password']['required'],
            ],
        ];

        if($this->validate([
            'name' => 'required|alpha',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[3]',
        ], $message))
        // if($this->model->save($_POST))
        {
            // $model = new ProductModel(); // create 1 new instance of object
            // dd($_POST['password']);
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // dd($_POST);
            $this->model->save($_POST);
            $this->session->setFlashdata('msg', 'Berjaya');
            return redirect()->to('/user/list');
        }
        else
        {
            // dd($this->validator->getErrors());
            $rows = $_POST;
            $page = 'user/form';
            $layouts = $this->layout;
            $this->session->setFlashdata('msg', 'Gagal');
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

    function genPDF()
    {
        $dompdf = new Dompdf();
        $html = view('');
        $dompdf->loadHtml("<h1>Hello World</h1>");
        $dompdf->render();
        $dompdf->stream();
    }
}
