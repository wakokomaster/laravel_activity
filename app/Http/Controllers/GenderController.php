<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function index(Gender $genderModel)
    {
        $genders = $genderModel->all();
        return view('gender.index')->with('genders', $genders);
    }
    public function show()
    {
    }
    public function create()
    {
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
