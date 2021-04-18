@extends('master')

@section('title', 'All Guest')

@section('contain')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a style="float: right!important;" href="{{route('create.form')}}" class="btn btn-info btn-xs pull-right m-b-1"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
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
          <th>SL NO	</th>
          <th>Name</th>
          <th>Email</th>
          <th>Nid NO</th>
          <th>Phone No</th>
          <th>Account No</th>
          <th>Tk</th>
          <th>Action</th>
        </tr>
      </thead>
      @php $total_balance_amount = 0; @endphp
      <tbody>
        @foreach($guests as $guest)
        @php
            $balance = App\Models\Balance::where('guest_id',$guest->id)->get();
            $total_balance_amount = 0;
            foreach($balance as $balance)
            {
                $total_balance_amount +=$balance->amount;
            } 
        @endphp
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$guest->firstname}} {{$guest->lastname}}</td>
          <td>{{$guest->email}}</td>
          <td>{{$guest->nid_no}}</td>
          <td>{{$guest->phone_no}}</td>
          <td>{{$guest->bank_account}}</td>
          <td>{{$total_balance_amount + $guest->balance}}</td>
          <td>
            <a href="{{route('edit.guest',$guest->id)}}" class="btn btn-info btn-sm"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
              </svg>
            </a>
            <a href="{{route('delete.guest',$guest->id)}}" class="btn btn-danger btn-sm"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
              </svg>
            </a>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@section('script')

@endsection