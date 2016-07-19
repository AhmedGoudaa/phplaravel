<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MyconController extends Controller
{
    
    public function index(){
//        return "hello Ahmed";
        $people =['ahmed','gouda','mohamed','kamal'];

        return view('Mycon/index')->withPeople($people);
    }

    public function store()
    {

    }

    public function show($a,$b='')
    {
        if (!empty($a)){
            if (!empty($b)){
                return "1+ ".$a."+2".$b;

            }

            return  "ahmed+ ".$a;


        }
        return "error 404";


    }

    public function edit($myconid)
    {
        return 'mycon id is '.$myconid;
    }

    public function ali($a)
    {
        return "Ali ".$a;
    }
}
