extends('layout.main')
@extends('layout.nav')
<title>Add Gender</title>
@section('content')
<style>
    .container {
        padding: 5%;
    }
</style>

<div class='container'>
    <form class="row g-4" action="/gender/store" method="POST">
        <h1>
            Add Gender
        </h1>
        @csrf
        <div class="row-md">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender">

            @error ('gender')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        <div class="col-12">
            <a href="/gender" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>

    </form>
</div>
@endsection
