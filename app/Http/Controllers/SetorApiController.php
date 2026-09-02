<?php

namespace App\Http\Controllers;

use App\Models\Setor;

class SetorApiController extends Controller
{
    public function index()
    {
        return Setor::all();
    }
}