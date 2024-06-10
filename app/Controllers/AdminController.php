<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    
    private $layout;
    private $layout_login;
    protected $session;

    function __construct() 
    {
        $this->layout = parent::layout();
        $this->layout_login = parent::layout_login();
        $this->session = session();
    }

    public function index()
    {
        //
    }

    function admin_dashboard()
    {
        
        $page = 'admin/dashboard';
        $layouts = $this->layout;
        return view('layout/default', [
            'page' => $page,
            'layout' => $layouts,
            // 'rows' => $rows,
        ]);
    }

    function user_dashboard()
    {
        $page = 'admin/dashboard_user';
        $layouts = $this->layout;
        return view('layout/default', [
            'page' => $page,
            'layout' => $layouts,
            // 'rows' => $rows,
        ]);
    }

    function no_access()
    {
        // dd("sini");
        $page = 'manage/no_access';
        $layouts = $this->layout_login;
        // dd($page);
        return view('layout/default', [
            'page' => $page,
            'layout' => $layouts,
            // 'rows' => $rows,
        ]);
    }
}
