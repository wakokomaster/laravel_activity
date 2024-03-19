<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    }

    public function show()
    {
    }


    public function create()
    {
        $genders = Gender::all();
        return view("user.create", compact("genders"));
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
    public function destroy()
    {
    }
}
