@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4 border-bottom pb-3 text-uppercase">Courier Information </h2>
    <br>

    <!-- Table  -->
<table class="table">
    <!-- Table head -->
    <thead>
      <tr>
        <th><i class="fas fa-leaf mr-2 blue-text" aria-hidden="true"></i>Code  </th>
        <th><i class="fas fa-leaf mr-2 blue-text" aria-hidden="true"></i>Sender Name </th>
        <th><i class="fas fa-leaf mr-2 teal-text" aria-hidden="true"></i>Receiver Name</th>
        <th><i class="fas fa-leaf mr-2 indigo-text" aria-hidden="true"></i>Sender Phone </th>
        <th><i class="fas fa-leaf mr-2 indigo-text" aria-hidden="true"></i>Receiver Phone </th>
        <th><i class="fas fa-leaf mr-2 indigo-text" aria-hidden="true"></i>Receiver Address </th>
        <th><i class="fas fa-leaf mr-2 indigo-text" aria-hidden="true"></i>Payment Status</th>
      </tr>
    </thead>
    <!-- Table head -->
  
    <!-- Table body -->
    <tbody>
      <tr>
      <td><i class="fa fa-barcode mr-2 grey-text" aria-hidden="true"></i>{{ $data->code}}</td>
      <td><i class="far fa-user mr-2 grey-text" aria-hidden="true"></i>{{ $data->sender_name}}</td>
        <td><i class="fas fa-user mr-2 grey-text" aria-hidden="true"></i>{{ $data->receiver_name}}</td>
        <td><i class="fas fa-phone mr-2 grey-text" aria-hidden="true"></i>{{ $data->sender_phone}}</td>
        <td><i class="fas fa-phone mr-2 grey-text" aria-hidden="true"></i>{{ $data->receiver_phone}}</td>
        <td><i class="fas fa-address-card mr-2 grey-text" aria-hidden="true"></i>{{ $data->receiver_address}}</td>
        <td><i class="fas fa-money-bill-alt mr-2 grey-text" aria-hidden="true"></i>{{ $data->payment_status}}</td>
      </tr>
      
    </tbody>
    <!-- Table body -->
  </table>
  <!-- Table  -->
  <br>
  <br>
  <br>

<table class="table">
    <!-- Table head -->
    <thead>
      <tr>
        <th><i class="fas fa-leaf mr-2 blue-text" aria-hidden="true"></i>Courier Type </th>
        <th><i class="fas fa-leaf mr-2 teal-text" aria-hidden="true"></i>Courier Create At </th>
        <th><i class="fas fa-leaf mr-2 indigo-text" aria-hidden="true"></i>Courier Quantity </th>
        <th><i class="fas fa-leaf mr-2 indigo-text" aria-hidden="true"></i>Courier Details </th>
        <th><i class="fas fa-leaf mr-2 indigo-text" aria-hidden="true"></i>Courier Fee </th>
        <th><i class="fas fa-leaf mr-2 indigo-text" aria-hidden="true"></i>Courier Status </th>
     
      </tr>
    </thead>
    <!-- Table head -->
  
    <!-- Table body -->
    <tbody>
      <tr>
        <td><i class="far fa-gem mr-2 grey-text" aria-hidden="true"></i>{{ $data->cname}}</td>
        <td><i class="fas fa-download mr-2 grey-text" aria-hidden="true"></i>{{ $data->created_at}}</td>
        <td><i class="fas fa-book mr-2 grey-text" aria-hidden="true"></i>{{ $data->currier_quantity}}</td>
        <td><i class="fas fa-book mr-2 grey-text" aria-hidden="true"></i>{{ $data->currier_details}}</td>
        <td><i class="fas fa-book mr-2 grey-text" aria-hidden="true"></i>{{ $data->currier_fee}}</td>

    @if($data->status == 'Pending')
        <td><button class="btn btn-primary"><i class="fas fa-book mr-2 grey-text" aria-hidden="true"></i>{{ $data->status}}</button></td>
     @elseif($data->status == 'Cancelled')
      <td><button class="btn btn-danger"><i class="fas fa-book mr-2 grey-text" aria-hidden="true"></i>{{ $data->status}}</button></td>
     @elseif($data->status == 'Returned')
      <td><button class="btn btn-warning"><i class="fas fa-book mr-2 grey-text" aria-hidden="true"></i>{{ $data->status}}</button></td>
     @elseif($data->status == 'On the way')
      <td><button class="btn btn-info"><i class="fas fa-book mr-2 grey-text" aria-hidden="true"></i>{{ $data->status}}</button></td>
     @elseif($data->status == 'Delivered')
      <td><button class="btn btn-success"><i class="fas fa-book mr-2 grey-text" aria-hidden="true"></i>{{ $data->status}}</button></td>
     @else 

     @endif


    
    </tr>
      
    </tbody>
    <!-- Table body -->
  </table>
  <!-- Table  -->
  @if(session()->has('message'))
  <div class="alert alert-success">
      {{ session()->get('message') }}
  </div>
@endif
  <br>
  <br>

  <div class="container">
    <h2>Change Courier Status</h2>

  <button type="button" onclick="window.location.href = '{{ URL::to('/courier/status/pending/'.$data->cid)}}'" class="btn btn-primary">Pending</button>
    <button type="button" onclick="window.location.href = '{{ URL::to('/courier/status/delivered/'.$data->cid)}}'" class="btn btn-success">Delivered</button>
    <button type="button" onclick="window.location.href = '{{ URL::to('/courier/status/on_the_Way/'.$data->cid)}}'" class="btn btn-info">On the Way </button>
    <button type="button" onclick="window.location.href = '{{ URL::to('/courier/status/return/'.$data->cid)}}'" class="btn btn-warning">Returned</button>
    <button type="button" onclick="window.location.href = '{{ URL::to('/courier/status/cancelled/'.$data->cid)}}'" class="btn btn-danger">Cancelled</button>
    
  </div>



  <br>
  
@endsection
