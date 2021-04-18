@extends('master')

@section('title', 'Edit Guest')

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
<form action="{{route('update.guest',$guest->id)}}" method="POST" class="row g-3">
 @csrf
    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname" value="{{$guest->firstname}}" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">last Name</label>
            <input type="text" class="form-control" name="lastname" value="{{$guest->lastname}}" placeholder="Last name" aria-label="Last name">
        </div>
    </div><br>
    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$guest->email}}" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">Nid Number</label>
            <input type="number" class="form-control" name="nid_no" value="{{$guest->nid_no}}" placeholder="Last name" aria-label="Last name">
        </div>
    </div><br>
    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">Phone Number</label>
            <input type="number" class="form-control" name="phone_no" value="{{$guest->phone_no}}" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">Bank Account</label>
            <input type="number" class="form-control" name="bank_account" value="{{$guest->bank_account}}" placeholder="Last name" aria-label="Last name">
        </div>
    </div><br>
    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">Account Balance</label>
            <input type="number" class="form-control" name="balance" value="{{$guest->balance}}" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Last name" aria-label="Last name">
        </div>
    </div><br>
    <select name="servicetype" class="form-select form-select-sm" aria-label=".form-select-sm example">
        <option value="">---- Please select Service Type----</option>
        <option value="guest">Guest</option>
        <option value="host">Host</option>
        <option value="other">Other</option>
      </select>
    <div class="clearfix">
        <a href="{{route('all.guest')}}" class="btn btn-warning" data-target="#exampleBasic" data-wizard="back">Back</a>
        <button class="btn btn-info pull-right" type="submit">Update</button>
     </div>
</form>
@endsection

@section('script')

@endsection