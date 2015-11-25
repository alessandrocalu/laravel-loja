<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Products;

class LojaAdminController extends Controller
{

    private $products;

    public function __construct(Products $products){
        $this->products = $products;
    }

    //
    public function index(){

        $listProducts = $this->products->paginate(5);

        return view('admin.products.index', compact('listProducts'));
    }

    //
    public function home(){

        $listProducts = $this->products->all();

        return view('admin.products.list', compact('listProducts'));
    }

    public function create(){
        return view('admin.products.create');
    }
}
