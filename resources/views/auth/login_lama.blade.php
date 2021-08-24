@extends('layout.main')

@section('content')

  <div class="row">
    <div class="col">
      <h2 class="mt-5">Login Form</h2>
      <form action="/user" method="POST" class="mt-5">
        @csrf
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>

@endsection