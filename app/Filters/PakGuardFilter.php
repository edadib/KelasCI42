<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PakGuardFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        //
        // dd(session());
        // echo "hehehe nindia!";
        $set_access = $arguments[0];
        if(! session()->has('isLoggedIn'))
        {
            return redirect()->to('/login/index');
        }
        else
        {
            $user_biasa = array('1','2');
            if($set_access == "admin" && session()->get('role') != 1)
            {
                //dd("masuk admin");
                return redirect()->to('/admin/no_access');
            }
            else if($set_access == "user" && !in_array(session()->get('role'), $user_biasa))
            {
                //dd("masuk user");
                return redirect()->to('/admin/no_access');
            }
            // if($set_access == "admin")
            // {
            //     return redirect()->to('/admin/admin_dashboard');
            // }
            // else if($set_access == "user")
            // {
            //     if(session()->get('role') == 1)
            //     {
            //         return redirect()->to('/admin/admin');
            //     }
            //     else if(session()->get('role') == 2)
            //     {
            //         return redirect()->to('/admin/user');
            //     }
            //     else
            //     {
            //         return redirect()->to('/admin/no_access');
            //     }
            // }
            // else
            // {
            //     // dd($arguments[0]);
            //     return redirect()->to('/admin/no_access');
            // }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
