<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitOfWorkController extends Controller
{
    public function summary()
    {
        return view("uow.summary");
    }

    public function agroprima()
    {
        return view("uow.agroprima");
    }

    public function farm()
    {
        return view("uow.farm");
    }

    public function sidosari()
    {
        return view("uow.sidosari");
    }

    public function asiapangan()
    {
        return view("uow.asiapangan");
    }

    public function food()
    {
        return view("uow.foods");
    }
}
