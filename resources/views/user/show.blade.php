@extends('layout.main')
@extends('layout.nav')
<title>View User</title>
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
    <h2 class="title">View User <b>#{{$user->user_id}}</b></h2>
    <form class="row g-4" action="#" method="POST">
        @csrf
        {{-- First Name --}}
        <div class="col-md-">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->first_name}} @if($user->middle_name){{$user->middle_name[0]}}. @endif{{$user->last_name}} @if($user->suffix_name){{$user->suffix_name}} @endif" readonly>
        </div>
        {{-- Birthday --}}
        <div class="col-md-3">
            <label for="birth_date" class="form-label">Birth Date</label> 
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{$user->birth_date}}" readonly>
        </div>
        {{-- Gender --}}
        <div class="col-md-2">
            <label for="gender_id" class="form-label">Gender</label>
            <input type="text" class="form-control" id="suffix_name" name="suffix_name" value="{{ $user->gender->gender }}" readonly>
        </div>
        {{-- Address --}}
        <div class="col-md-7">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}" readonly>
        </div>
        {{-- Contact Number --}}
        <div class="col-md-4">
            <label for="contact_num" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact_num" name="contact_num" value="{{$user->contact_num}}" readonly>
        </div>
        <div class="col-md-4">
            <label for="email_address" class="form-label">Email Address</label>
            <input type="text" class="form-control" id="email_address" name="email_address" value="{{$user->email_address}}" readonly>
        </div>
        {{-- Username --}}
        <div class="col-md-">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" readonly>
        </div>

        {{-- Buttons --}}
        <div class="col-12">
            <a href="/user" class="btn btn-danger">Back</a>

        </div>
    </form>
</div>
@endsection