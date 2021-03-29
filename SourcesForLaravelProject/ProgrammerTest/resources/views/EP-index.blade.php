@extends('layouts.app')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>FirstName</td>
          <td>LastName</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Company</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->FirstName}}</td>
            <td>{{$employee->LastName}}</td>
            <td>{{$employee->Email}}</td>
            <td>{{$employee->PhoneNumber}}</td>
            <td>{{$employee->Name}}</td>
            <td class="text-center">
              <a href="{{ route('employees.create')}}" class="btn btn-primary btn-sm">Create</a>
              <a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-warning btn-sm">Edit</a>              
              <form action="{{ route('employees.destroy', $employee->id)}}" method="post" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
              </form>
        </tr>
        @endforeach
    </tbody>
  </table>
   {{-- Pagination --}}
   <div class="d-flex justify-content-center">
    {!! $employees->links() !!}
</div>
<div>

@endsection