@extends('layout.main')

@section('content')
  
  <div class="row">
    <div class="col">

      <h2 class="mt-5">List of Companies</h2>

      @if( session('success') )
        <p class="alert alert-success">
          {{ session('success') }}
        </p>
      @endif
      
      @auth
        @if (((Auth::user()->name) === 'Admin'))
          <a href="{{ route('company-create') }}" class="btn btn-primary mt-3">Add New</a>
        @endif
      @endauth

      <table class="table table-hover mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Logo</th>
            <th scope="col">Website</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($companies as $company)
            <tr>
              <th scope="row">{{ $company->id }}</th>
              <td>{{ $company->name }}</td>
              <td>{{ $company->email }}</td>
              <td><img src="{{ asset("storage/$company->logo") }}" alt="{{$company->logo}}" style="border-radius: 8px;" width="300"></td>
              <td>{{ $company->website }}</td>
              @auth
                @if ((Auth::user()->name) === 'Admin')
                  <td>
                    <a href="{{ route('company-edit', $company->id )}}" class="btn btn-primary">Edit</a>

                    <form action="{{ route('company-destroy', $company->id )}}" method="post" class="d-inline" 
                      onsubmit="return confirm('Are you sure you want to delete this company named {{$company->name}}?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                  </td>
                @else
                  <td>
                    <div class="alert alert-warning" role="alert">
                      You have <a href="#" class="alert-link">no access</a> to edit or delete this record.
                    </div>
                  </td>
                @endif
              @endauth
            </tr>            
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection