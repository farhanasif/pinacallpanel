@extends('master')

@section('title', 'Create Balance')

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
<form action="{{route('balance.store')}}" method="post" class="row g-3">
 @csrf
    <div class="row">
        @foreach ($guests as $guest)
          <input type="hidden" name="guest_id" value="{{ $guest->id}}">
        @endforeach
        <div class="col">
            <label>Service Type</label>
            <select name="phone_number" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">---- Please select Service Type----</option>
                @foreach ($guests as $guest)
                    <option value="{{ $guest->phone_no }}">{{ $guest->phone_no}}</option>
                @endforeach
              </select>
        </div>
        <div class="col">
            <label>Amount</label>
            <input type="number" placeholder="Enter Amount" name="amount" class="form-control">
        </div>
    </div><br>

    <div class="clearfix">
        <a href="{{route('all.balance')}}" class="btn btn-warning" data-target="#exampleBasic" data-wizard="back">Back</a>
        <button class="btn btn-info pull-right" type="submit">Submit</button>
     </div>
</form>
@endsection

@section('script')

@endsection