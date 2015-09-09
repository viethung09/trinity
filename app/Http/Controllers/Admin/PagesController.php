<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends AdminController
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return "Site Admin pages.<br /><br />" . \Auth::user();
    }

}
