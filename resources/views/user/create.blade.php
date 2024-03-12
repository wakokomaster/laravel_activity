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
        <form class="row g-4">
            {{-- First Name --}}
            <div class="col-md-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>
            {{-- Middle Name --}}
            <div class="col-md-3">
                <label for="middle_name" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name">
            </div>
            {{-- Last Name --}}
            <div class="col-md-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            {{-- Suffix --}}
            <div class="col-md-3">
                <label for="suffix_name" class="form-label">Suffix</label>
                <input type="text" class="form-control" id="suffix_name" name="suffix_name">
            </div>
            {{-- Birthday --}}
            <div class="col-md">
                <label for="birth_date" class="form-label">Birth Date</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date">
            </div>
            {{-- Gender --}}
            <div class="col-md">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select">
                    <option selected>Select Gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Others</option>
                </select>
            </div>
            {{-- Address --}}
            <div class="col-md-5">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            {{-- Contact Number --}}
            <div class="col-md-4">
                <label for="contact_num" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact_num" name="contact_num">
            </div>
            <div class="col-md-4">
                <label for="email_address" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="email_address" name="email_address">
            </div>
            {{-- Username --}}
            <div class="col-md-">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            {{-- Password --}}
            <div class="col-md">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
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
