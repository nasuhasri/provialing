@extends('layout.main')

@section('content')

  <h1 class="mt-5">Edit Company</h1>

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

  <form class="mt-5" action="{{ route('company-update', $company->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="name">Company Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter company name..." value="{{ $company->name }}">
    </div>
    <div class="form-group">
      <label for="email">Company Email</label>
      <input type="email" class="form-control" name="email" placeholder="Enter company email..." value="{{ $company->email }}">
    </div>
    <div class="form-group">
      <label for="logo">Company Logo</label>
      <input type="file" class="form-control-file mb-3" name="logo" value="{{ $company->logo }}">
      <img src="{{ asset("storage/$company->logo") }}" alt="{{$company->logo}}" style="border-radius: 8px;" width="300">
    </div>
    <div class="form-group">
      <label for="website">Company Website</label>
      <input type="text" class="form-control" name="website" placeholder="Enter company's website url name..." value="{{ $company->website }}">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>

@endsection