@extends('layout.main')
@extends('layout.nav')
<title>Add a user</title>
@section('content')
<style>
    .container {
        padding: 5%;
    }

    .title {
        padding-bottom: 20px
    }
</style>

<div class='container'>
    <h2 class="title">Add User</h2>
    <form class="row g-4" action="/user/store" method="POST">
        @csrf
        {{-- First Name --}}
        <div class="col-md-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}">
            @error ('first_name')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        {{-- Middle Name --}}
        <div class="col-md-3">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{old('middle_name')}}">
        </div>
        {{-- Last Name --}}
        <div class="col-md-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}">
            @error ('last_name')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        {{-- Suffix --}}
        <div class="col-md-3">
            <label for="suffix_name" class="form-label">Suffix</label>
            <input type="text" class="form-control" id="suffix_name" name="suffix_name" value="{{old('suffix_name')}}">
        </div>
        {{-- Birthday --}}
        <div class="col-md-3">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{old('birth_date')}}">
            @error ('birth_date')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        {{-- Gender --}}
        <div class="col-md-2">
            <label for="gender_id" class="form-label">Gender</label>
            <select class="form-select" id="gender_id" name="gender_id" value="{{old('gender_id')}}">
                @foreach ($genders as $gender)
                <option value="{{$gender->gender_id}}">{{$gender->gender}}</option>
                @endforeach
            </select>
        </div>
        {{-- Address --}}
        <div class="col-md-7">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}"> 
            @error ('address')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        {{-- Contact Number --}}
        <div class="col-md-4">
            <label for="contact_num" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact_num" name="contact_num" value="{{old('contact_num')}}">
            @error ('contact_num')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        <div class="col-md-4">
            <label for="email_address" class="form-label">Email Address</label>
            <input type="text" class="form-control" id="email_address" name="email_address" value="{{old('email_address')}}">
            @error ('email_address')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        {{-- Username --}}
        <div class="col-md-">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}">
            @error ('username')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        {{-- Password --}}
        <div class="col-md">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error ('password')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        {{-- Confirm Passowrd --}}
        <div class="col-md">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
        </div>

        {{-- Buttons --}}
        <div class="col-12">
            <a href="/user" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection