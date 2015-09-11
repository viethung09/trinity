<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use View;

class TrinityController extends AdminController
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @param null $name
     * @return $this|View
     */
    public function showView($name = null)
    {
        if(view()->exists('admin/'.$name))
        {
           if(Auth::check())
           {
               return view('admin/'. $name);
           }
           return redirect('auth/login')->withErrors('error', 'You must be logged in.');
        }

        if(view()->exists('admin/pages/'. $name))
        {
            if(Auth::check())
            {
                return view('admin/pages/'. $name);
            }
            return redirect('auth/login')->withErrors('error', 'You must be logged in.');
        }

        return view('admin.errors.404');
        
    }
}
