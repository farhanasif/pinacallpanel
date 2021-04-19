@extends('master')

@section('title', 'Edit Host')

@section('contain')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        This week
      </button>
    </div>
</div>
{{-- @include('partials._message') --}}
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ Session::get('success') }}
    </div>
@endif
@if(Session::has('failed'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ Session::get('failed') }}
    </div>
@endif
<form action="{{route('update.host',$host->id)}}" method="POST" class="row g-3" enctype="multipart/form-data">
 @csrf
    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname" value="{{$host->firstname}}" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">last Name</label>
            <input type="text" class="form-control" name="lastname" value="{{$host->lastname}}" placeholder="Last name" aria-label="Last name">
        </div>
    </div><br>
    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$host->email}}" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <label>Latitude</label>
            <input type="number" placeholder="Latitude" name="latitude" class="form-control" value="{{$host->latitude}}">
        </div>
    </div><br>
    <div class="row">
        <div class="col">
            <label>Nid Number</label>
            <input type="number" placeholder="Nid" name="nid_no" class="form-control" value="{{$host->nid_no}}">
        </div>
        <div class="col">
            <label>Phone Number</label>
            <input type="number" placeholder="Phone No" name="phone_no" class="form-control" vvalue="{{$host->phone_no}}">
        </div>
    </div><br>
    <div class="row">
        <div class="col">
            <label>Bank Account</label>
            <input type="number" placeholder="Bank Account" name="bank_account" class="form-control" value="{{$host->bank_account}}">
        </div>
        <div class="col">
            <label>Account Balance</label>
            <input type="number" placeholder="Balance" name="balance" class="form-control" value="{{$host->balance}}">
        </div>
    </div><br>
    <div class="row">
        <div class="col" hidden="">
            <label>Password</label>
            <input type="password" placeholder="Password" name="password" value="{{$host->password}}" class="form-control">
        </div>
        <div class="col">
            <label>Longitude </label>
            <input type="number" placeholder="Longitude" name="longitude" class="form-control" value="{{$host->longitude}}">
        </div>
    </div><br>
    <select name="servicetype" class="form-select form-select-sm" aria-label=".form-select-sm example">
        <option value="">---- Please select Service Type----</option>
        <option value="host">Host</option>
      </select>
    <div class="row">
        <div class="col">
            <label>Nid File</label>
            <input type="File" placeholder="Input File" id="nid_file" name="nid_file" class="form-control">
        </div>
        <div class="col">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo Preview <!-- <span class="required">*</span> -->
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <img id="photo_preview" style="width: 180px;height: 180px" src="{{ asset('upload/file/'. $host->nid_file) }}" alt="" alt="">
            </div>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{route('all.host')}}" class="btn btn-warning" data-target="#exampleBasic" data-wizard="back">Back</a>
        <button class="btn btn-info pull-right" type="submit">Update</button>
     </div>
</form>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#photo_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#nid_file").change(function() {
        readURL(this);
    });
</script>
@endsection