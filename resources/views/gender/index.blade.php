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
        <th scope="col">Gender</th>
        <th scope="col">Date Created</th>
        <th scope="col">Date Updated</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Male </td>
        <td>Date</td>
        <td>Date </td>
        <td>
        <a href="/gender/edit" class="btn btn-primary">Update</a>
        <a href="/gender/delete" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    </tbody>
  </table>

</div>


@endsection

