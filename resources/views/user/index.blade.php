@extends('layout.main')
<!-- @extends('layout.nav') -->
@section('content')

<!-- Should rewrite avoid using percentages when dealing with small values -->
<style>
    .container {
        padding-top: 2%;
        /* padding-right: 10%; */
        border: 1px solid grey;
        border-radius: 5px;
        margin-top: 2%;
    }

    .btn {
        padding-left: 3%;
        padding-right: 3%;
    }

    .image-fluid {
        margin: 10px;
        aspect-ratio: 1;
        border-radius: 500px;
        max-width: 100px;
    }
</style>


<div class="container">
    <h1>List of Users</h1>
    <form class="d-flex" action="/home">
        <label class="d-none" for="search">Search</label>
        <input class="w-25 form-control" type="text" name="search" id="search" placeholder="Search">
        <input class="btn btn-primary" type="submit" value="Search">
    </form>
    <div>
        @include('include.messages')
    </div>
    <table class="table table-responsive">
        {{ $users->withQueryString()->links() }}
        <div>
            <a href="/user/create" class="btn btn-primary float-end">Add User</a>
        </div>
        <thead>
            <tr>
                <th class="col">User Profile</th>
                <th class="col">First Name</th>
                <th class="col">Middle Name</th>
                <th class="col">Last Name</th>
                <th class="col">Address</th>
                <th class="col">Gender</th>
                <th class="col">Email Address</th>
                <th class="col-2" style="margin: 10px" >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td><img class="image-fluid" src="{{ $user->user_image ? asset('storage/img/user/' . $user->user_image) : 'https://www.shutterstock.com/image-vector/default-avatar-profile-icon-social-600nw-1677509740.jpg' }}" alt=""></td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->middle_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->gender->gender}}</td>
                <td>{{$user->email_address}}</td>
                <td>
                    <a href="/user/show/{{$user->user_id}}" class="btn btn-primary">View</a>
                    <a href="/user/edit/{{$user->user_id}}" class="btn btn-warning">Update</a>
                    <a href="/user/delete/{{$user->user_id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection
