@extends('layout.main')

@section('content')

  <div class="row">
    <div class="col">

      <h2 class="mt-5">List of Employees</h2>

      @if(session('success'))
        <p class="alert alert-success">
          {{ session('success') }}
        </p>
      @endif

      @auth
        @if (((Auth::user()->name) === 'Admin'))
          <a href="{{ route('employee-create') }}" class="btn btn-primary mt-3 mb-3">Add New Employee</a>    
        @endif
      @endauth

      <table class="table table-hover mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Company</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($employees as $employee)
            <tr>
              <th scope="row">{{ $employee->id }}</th>
              <td>{{ $employee->first_name }}</td>
              <td>{{ $employee->last_name }}</td>
              <td>{{ $employee->email }}</td>
              <td>{{ $employee->phone }}</td>
              <td>{{ $employee->name }}</td>
              
              @auth
                @if (((Auth::user()->name) === 'Admin'))
                  <td>
                    <a href="{{ route('employee-edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                    
                    <form action="{{ route('employee-destroy', $employee->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this record?')">
                      @method('delete')
                      @csrf
                        <button class="btn btn-danger" type="submit">DELETE</button>
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