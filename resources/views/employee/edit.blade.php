@extends('layout.main')

@section('content')

  <div class="row">
    <div class="col">
      <h2 class="mt-5 mb-5">Edit Employee Form</h2>

      @if($errors->any())
        <div class="alert alert-danger">
          <strong>Whoops!</strong>
          <p>There were some problem with your input.</p>

          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('employee-update', $employee->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}">
        </div>
        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="{{ $employee->email }}">
        </div>
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="number" class="form-control" name="phone" value="{{ $employee->phone }}">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>

@endsection