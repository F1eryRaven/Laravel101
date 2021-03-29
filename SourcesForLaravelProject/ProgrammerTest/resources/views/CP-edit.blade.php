@extends('layouts.app')

@section('content')

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
    Add Company
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
  </div>
  <img src="images/{{ Session::get('image') }}">
  @endif

  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
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
      <form method="post" action="{{ route('companies.update',$companies->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="Name">Name</label>
              <input type="text" class="form-control" name="Name" value="{{ $companies->Name }}"/>
              <label for="Email">Email</label>
              <input type="text" class="form-control" name="Email" value="{{ $companies->Email }}"/>
          </div>
          <div class="form-group">
              <label for="Website">Website</label>
              <input type="text" class="form-control" name="Website" value="{{$companies->website}}"/>
              <label for="image">Please place your company logo here </label>
              <input type="file"class="form-control" name="image" />
            </div>
          </div>
          <button class="btn btn-block btn-success">Update Company</button>
      </form>
  </div>
</div>
@endsection