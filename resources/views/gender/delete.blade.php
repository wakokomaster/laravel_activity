@extends ('layout.main')

@section('content')

<style>
    .container {
        padding: 10%;
        text-align: center;
    }
</style>

<div class="container">
    <h1>Are you sure you want to delete this gender?</h1>

    <a href="/gender/index" class="btn btn-primary"> Back </a>
    <button type="submit" class="btn btn-danger">Delete</button>

</div>


@endsection