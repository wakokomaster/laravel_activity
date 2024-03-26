<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }


    public function create()
    {
        $genders = Gender::all();
        return view("user.create", compact("genders"));
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'first_name' => ['required'],
        //     'middle_name'=> '',
        //     'last_name'=> ['required'],
        //     'suffix_name'=> '',
        //     'gender_id'=> ['required'],
        //     'birth_date'=>['required'],
        //     'address'=>['required'],
        //     'contact_num'=>['required'],
        //     'email_address'=>['required','unique:users','email'],
        //     'username'=>['required','unique:users'],
        //     'password'=>['required','same:confirm_password'],
        // ]);
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'middle_name'=> '',
            'last_name'=> ['required'],
            'suffix_name'=> '',
            'gender_id'=> ['required'],
            'birth_date'=>['required'],
            'address'=>['required'],
            'contact_num'=>['required'],
            'email_address'=>['required','unique:users','email'],
            'username'=>['required','unique:users'],
            'password'=>['required','same:confirm_password'],
        ]);

        $validated = $validator->validate(); 

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
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'middle_name'=> '',
            'last_name'=> ['required'],
            'suffix_name'=> '',
            'gender_id'=> ['required'],
            'birth_date'=>['required'],
            'address'=>['required'],
            'contact_num'=>['required'],
            'email_address' => [
                'required',
                'email', 
                Rule::unique('users')->ignore($user),
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($user),
            ],
        ]);

        $validated = $validator->validate(); 
        $user->update($validated);
        return redirect('user')->with('message_success', 'User Successfully Updated!');
    }

    public function delete($id)
    {
        $user = User::find($id);

        return view('user.delete', compact('user'));   
    }
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return redirect('user')->with('message_success','User Deleted Successfully!');
    }
}
