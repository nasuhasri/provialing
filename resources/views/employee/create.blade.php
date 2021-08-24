@extends('layout.main')

@section('content')

  <div class="row">
    <div class="col">
      <h2 class="mt-5 mb-5">Employee Form</h2>

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

      <form action="{{ route('employee-store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" name="first_name" placeholder="Ahmad">
        </div>
        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" name="last_name" placeholder="Muhammad">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
        </div>
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="number" class="form-control" name="phone" placeholder="01165442132">
        </div>
        <div class="form-group">
          <label for="company">Company</label>
          <select class="form-control" name="comp_id">
            {{-- error here........... --}}
            <option value="">Default</option>
            @foreach ($companies as $company)
              <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
          </select>            
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

@endsection