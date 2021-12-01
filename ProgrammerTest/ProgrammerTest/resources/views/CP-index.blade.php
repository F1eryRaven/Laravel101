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
  @if(session()->get('failure'))
  <div class="alert alert-failure">
    {{ session()->get('failure') }}  
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Name</td>
          <td>Email</td>
          <td>Website</td>
          <td>Logo</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td>{{$company->Name}}</td>
            <td>{{$company->Email}}</td>
            <td>{{$company->Website}}</td>
            <td><img src="{{$company->LogoLocation}}"/> </td>
            <td class="text-center">
              <a href="{{ route('companies.create')}}" class="btn btn-primary btn-sm">Create</a>
              <a href="{{ route('companies.edit', $company->id)}}" class="btn btn-warning btn-sm">Edit</a>    
              <form action="{{ route('companies.destroy', $company->id)}}" method="post" style="display: inline-block">
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
      {!! $companies->links() !!}
  </div>
<div>
@endsection