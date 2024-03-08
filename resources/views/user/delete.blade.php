@extends ('layout.main')

@section('content')

<style>
    .container {
        padding: 10%;
        text-align: center;
    }
</style>

<div class="container">
    <h1>Are you sure you want to delete this user?</h1>

    <a href="/user" class="btn btn-primary"> Back </a>
    <button type="submit" class="btn btn-danger">Delete</button>

</div>





@endsection