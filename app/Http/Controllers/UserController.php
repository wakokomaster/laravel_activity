<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{
    public function index()
    {
        $search = request()->get('search');
        if (!$search) {
            $users = User::paginate(10);

            return view('user.index', compact('users'));
        }

        $searchedGender = Gender::where('gender', $search)->first();
        if ($searchedGender) {
            $users = User::where('gender_id', $searchedGender['gender_id'])
                ->paginate(10);

            return view('user.index', compact('users'));
        }

        $users = User::where('first_name', 'LIKE', "%$search%")
            ->orWhere('last_name', 'LIKE', "%$search%")
            ->orWhere('middle_name', 'LIKE', "%$search%")
            ->paginate(10);

        // NOTE: As of laravel 7, ->appends() can be substitued with a ->withQueryString call before ->links()
        // ->appends(['search' => $search]);

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
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'middle_name' => '',
            'last_name' => ['required'],
            'suffix_name' => '',
            'gender_id' => ['required'],
            'birth_date' => ['required'],
            'address' => ['required'],
            'contact_num' => ['required'],
            'email_address' => ['required', 'unique:users', 'email'],
            'username' => ['required', 'unique:users'],
            'password' => ['required', 'same:confirm_password'],
        ]);

        $validated = $validator->validate();

        $validated['password'] = password_hash($validated['password'], PASSWORD_BCRYPT);
        User::create($validated);

        return redirect('/home')->with('message_success', 'User Created Successfully!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $genders = Gender::all();
        return view('user.edit', compact('genders', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'middle_name' => '',
            'last_name' => ['required'],
            'suffix_name' => '',
            'gender_id' => ['required'],
            'birth_date' => ['required'],
            'address' => ['required'],
            'contact_num' => ['required'],
            'email_address' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user),
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($user),
            ],
            'user_image' => [
                'nullable', File::image(), 'max:16000'
            ]
        ]);

        $validated = $validator->validate();

        if($request->hasFile('user_image')) {   
            $filenameWithExtention = $request->file('user_image');

            $filename = pathinfo($filenameWithExtention, PATHINFO_FILENAME);    

            $extension = $request->file('user_image')->getClientOriginalExtension();

            $filenameToStore = $filename .'_'. time() . '.' . $extension;

            $request ->file('user_image')->storeAs('public/img/user',$filenameToStore);

            $validated['user_image'] = $filenameToStore;
        }

        $user->update($validated);
        return redirect('/home')->with('message_success', 'User Successfully Updated!');
    }

    public function delete($id)
    {
        $user = User::find($id);

        return view('user.delete', compact('user'));
    }

    public function destroy(User $user)
    {
        if ($user->user_image && Storage::exists('public/img/user/' . $user->user_image)) {
            Storage::delete('public/img/user/' . $user->user_image);
        }

        $user->delete();
        return redirect('/home')->with('message_success', 'User Deleted Successfully!');
    }

    public function login()
    {
        return view('login.index');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $potentialUser = User::where('username', $request->input('username'))
            ->first();

        if (!$potentialUser) {
            return redirect()->to('/login')
                ->withErrors(['username' => 'Wrong username or password']);
        }

        if (!password_verify($request->input('password'), $potentialUser['password'])) {
            return redirect()->to('/login')
                ->withErrors(['username' => 'Wrong username or password']);
        }

        // NOTE: Investigate the functionality of auth()->attempt()
        // auth()->attempt([
        //     'username' => $request->input('username'),
        //     'password' => $request->input('password'),
        // ]);

        auth()->login($potentialUser);
        request()->session()->regenerate();

        return redirect()->to('/home');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/login');
    }
}
