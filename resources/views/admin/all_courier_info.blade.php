@extends('admin.layouts.master')
@section('content')
<body>
    
    <div class="container">
        <h1>All Brances Courier Information <br/></h1>
        <br>
        <br>
       <table class="table table-bordered data-table">
            <thead>
                <tr>
                <th>No</th>
                <th>Sender Name</th>
                <th>Sender Phone</th>
                <th>Create At </th>
                <th>Branch Name </th>
                <th>Booking Status</th>
                <th width="100px">Action</th>
                </tr>
            </thead>
        </table>
    </div>
    <script type="text/javascript">
        $(function () {
          
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('all/courier') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'sender_name', name: 'sender_name'},
                  {data: 'sender_phone', name: 'sender_phone'},
                  {data: 'created_at', name: 'created_at'},
                  {data: 'bname', name: 'bname'},
                  {data: 'status', name: 'status'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
      </script>

    </body>
@endsection
