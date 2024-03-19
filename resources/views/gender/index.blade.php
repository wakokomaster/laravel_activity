@extends('layout.main')

@extends('layout.nav')
<Title>Gender</Title>
@section('content')
<style>
    .container {
        padding-top: 2%;
        border: 1px solid grey;
        border-radius: 5px;
        margin-top: 2%;
    }
</style>

<div class="container">
    @include('include.messages')
    <h2>Gender</h2>
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
            @foreach ($genders as $gender)
            <tr>
                <td>{{ $gender->gender }} </td>
                <td>{{ $gender->created_at }}</td>
                <td>{{ $gender->updated_at }} </td>
                <td>
                    <div class="btn-group">
                        <a href="/gender/show/{{$gender->gender_id}}" class="btn btn-primary">View</a>
                        <a href="/gender/edit/{{$gender->gender_id}}" class="btn btn-warning">Update</a>
                        <a href="/gender/delete/{{$gender->gender_id}}" class="btn btn-danger">Delete</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <a class="btn btn-primary float-end" href="/gender/create" role="button">Add Gender</a>
    </table>

</div>
@endsection