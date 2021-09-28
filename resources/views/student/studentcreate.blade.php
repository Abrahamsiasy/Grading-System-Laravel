@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student create form</h1>
    <form method="POST" action="/student">
    @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Full Name">
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection