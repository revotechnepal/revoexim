@extends('backend.layouts.app')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">All Services <a href="{{route('admin.service.create')}}" class="btn btn-success ml-4"><i class="fas fa-plus"></i> Add New Service</a></li>
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
                <th>Title</th>
                <th>Slug</th>
                <th>Details</th>
                <th>Icon</th>
                <th>Status</th>
                <th>Featured</th>
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {

          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.service.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'title', name: 'title'},
                  {data: 'slug', name: 'slug'},
                  {data: 'details', name: 'details'},
                  {data: 'icon', name: 'icon'},
                  {data:'status', name: 'status'},
                  {data:'featured', name: 'featured'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });

        });
      </script>
@endsection
