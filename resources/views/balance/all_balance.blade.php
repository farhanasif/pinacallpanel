@extends('master')

@section('title', 'All Balance')

@section('contain')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a style="float: right!important;" href="{{route('create.balance')}}" class="btn btn-info btn-xs pull-right m-b-1"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
      </svg>Add</a>

    </div>
</div>

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
{{-- @include('partials._message') --}}
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
            <th>SL NO</th>
            <th>Phone Number</th>
            <th>Tk</th>
            <th>Date</th>
        </tr>
      </thead>
      @php $i=1; @endphp
      <tbody>
        @foreach($balances as $balance)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$balance->phone_number}}</td>
            <td>{{$balance->amount}}</td>
            <td>
             {{ date('j F, Y', strtotime($balance->created_at)) }} 
            </td>
        </tr>
        @endforeach
      </tbody>
      
    </table>
  </div>
@endsection

@section('script')

@endsection