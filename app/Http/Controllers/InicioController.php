<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getInicio()
    {

     return view("inicio");

   }

 }
