@extends('layouts.app')

@section('content')
@if(session()->has('jsAlert'))
<script>
    alert({{ session()->get('jsAlert') }});
</script>
@endif 
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Edit & Update
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('employees.update', $employee->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="FirstName">First Name</label>
              <input type="text" class="form-control" name="FirstName" value="{{ $employee->FirstName }}"/>
          </div>
          <div class="form-group">
            @csrf
            @method('PATCH')
            <label for="LastName">Last Name</label>
            <input type="text" class="form-control" name="LastName" value="{{ $employee->LastName }}"/>
        </div>
          <div class="form-group">
              <label for="Email">Email</label>
              <input type="Email" class="form-control" name="Email" value="{{ $employee->Email }}"/>
          </div>
          <div class="form-group">
              <label for="PhoneNumber">Phone</label>
              <input type="tel" class="form-control" name="PhoneNumber" value="{{ $employee->PhoneNumber }}"/>
          </div>
          <div class="form-group">
              <label for="CompanyID">Company</label>
              <input type="text" class="form-control" name="CompanyID" value="{{ $employee->CompanyID}}"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection
