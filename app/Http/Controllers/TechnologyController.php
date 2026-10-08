<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index() {
        return view("technology.index", []);
    }

    public function halalBlockchain() {
        return view("technology.halalblockchain", []);
    }

    public function smartFarm() {
        return view("technology.smartfarm", []);
    }

    public function pineapple() {
        return view("technology.pineapple", []);
    }
}
