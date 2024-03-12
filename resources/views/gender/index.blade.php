@extends('layout.main')

@extends('layout.nav')
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
                            <a href="/gender/edit" class="btn btn-primary">Update</a>
                            <a href="/gender/delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
