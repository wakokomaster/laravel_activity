@extends('layout.main')
@extends('layout.nav')
<title>View Gender</title>
@section('content')
<style>
    .container {
        padding: 5%;
    }
</style>

<div class='container'>
    <form class="row g-4" action="/gender/destroy/{{$gender->gender_id}}" method="POST">
        @method('DELETE')
        @csrf
        <h2>
            Are you sure you want to delete this Gender?
        </h2>
        <div class="row-md">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" value="{{$gender->gender}}" readonly>
        </div>
        <div class="col-12">
            <a href="/gender" class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
</div>
@endsection