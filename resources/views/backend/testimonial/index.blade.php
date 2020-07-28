@extends('backend.layouts.app')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">All Testimonials <a href="{{route('admin.testimonial.create')}}" class="btn btn-success ml-4"><i class="fas fa-plus"></i> Add New Testimonial</a></li>
    </ol>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Company_Name</th>
                <th>Post</th>
                <th>Message</th>
                <th>Image</th>
                <th>Status</th>
                <th width="120px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {

          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.testimonial.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'name', name: 'name'},
                  {data: 'company_name', name: 'slug'},
                  {data: 'post', name: 'post'},
                  {data: 'message', name: 'message'},
                  {data: 'image', name: 'image'},
                  {data:'status', name: 'status'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });

        });
      </script>
@endsection
