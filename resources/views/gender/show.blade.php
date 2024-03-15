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
    <form class="row g-4" action="#" method="POST">
        <h2>
        View Gender
        </h2>
        <div class="row-md">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" value="{{$genders->gender}}" readonly>
        </div>
        <div class="col-12">
            <a href="/gender" class="btn btn-danger float-end">Back</a>
        </div>
    </form>
</div>
@endsection