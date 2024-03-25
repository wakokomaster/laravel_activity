<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $users = User::with('gender')->get();
        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $users = User::with('gender')->get();
        return view('user.show', compact('user'));
    }


    public function create()
    {
        $genders = Gender::all();
        return view("user.create", compact("genders"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'middle_name'=> '',
            'last_name'=> ['required'],
            'suffix_name'=> '',
            'gender_id'=> ['required'],
            'birth_date'=>['required'],
            'address'=>['required'],
            'contact_num'=>['required','numeric'],
            'email_address'=>['required','email'],
            'username'=>['required'],
            'password'=>['required','same:confirm_password'],
        ]);
    
        $validated['password'] = Hash::make($validated['password']);
    
        User::create($validated);

        return redirect('user')->with('message_success','User Created Successfully!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $genders = Gender::all();
        return view('user.edit', compact('genders','user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'middle_name'=> '',
            'last_name'=> ['required'],
            'suffix_name'=> '',
            'gender_id'=> ['required'],
            'birth_date'=>['required'],
            'address'=>['required'],
            'contact_num'=>['required','numeric'],
            'email_address'=>['required','email'],
            'username'=>['required'],
        ]);

        $user->update($validated);

        return redirect('user')->with('message_success', 'User Successfully Updated!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $users = User::with('gender')->get();
        return view('user.delete', compact('user'));   
    }
    public function destroy(Request $request, User $user)
    {
        $user->delete($request);
        return redirect('user')->with('message_success','User Deleted Successfully!');
    }
}
