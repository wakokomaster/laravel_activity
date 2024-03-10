@extends('layout.main')
@extends('layout.nav')
<title>Add a user</title>
@section('content')
<style>
    .container {
        padding: 5%;
    }
</style>

<div class='container'>
    <form class="row g-4">Add Gender
        <div class="row-md">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender">
        </div>
        <div class="col-12">
            <a href="/user" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection