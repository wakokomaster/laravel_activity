@extends('layout.main')
@extends('layout.nav')
@section('content')


<div class="container">

  <style>
    .container {
      padding-top: 2%;
    }
  </style>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID#</th>
        <th scope="col">First Name</th>
        <th scope="col">Middle Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Address</th>
        <th scope="col">Gender</th>
        <th scope="col">Email Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Martin</td>
        <td>Alicaya</td>
        <td>Retuma</td>
        <td>Roxas City</td>
        <td>Male</td>
        <td>mretuma@gmail.com</td>
        <td>
        <a href="/edit" class="btn btn-primary">Update</a>
        <a href="/delete" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    </tbody>
  </table>

</div>


@endsection