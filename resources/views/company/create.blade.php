@extends('layout.main')

@section('content')

  <h1 class="mt-5">Add New Company</h1>

  @if( $errors->any() )
    <div class="alert alert-danger">
      <strong>Whoops!</strong> <p>There were some problems with your input.</p>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form class="mt-5" action="{{ route('company-store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="name">Company Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter company name...">
    </div>
    <div class="form-group">
      <label for="email">Company Email</label>
      <input type="email" class="form-control" name="email" placeholder="Enter company email...">
    </div>
    <div class="form-group">
      <label for="logo">Company Logo</label>
      <input type="file" class="form-control-file" name="logo">
    </div>
    <div class="form-group">
      <label for="website">Company Website</label>
      <input type="text" class="form-control" name="website" placeholder="Enter company's website url name...">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection