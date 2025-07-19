<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Catgory;
use Illuminate\Http\Request;

class CatgoryController extends Controller
{
    public function index()
    {
        return response()->json(Catgory::all());
    }
     
    
    //
}
