<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // 
    public function index(){
        return 'index';
    }
    public function show($id){
        return User::findOrFail($id);
    } 
}
