<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
   function __construct()
   {
       $this->middleware('auth');
       $this->middleware('admin');
   }
}
