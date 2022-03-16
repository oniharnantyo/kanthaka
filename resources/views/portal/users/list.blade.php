@extends('portal.layout.content')
@section('title', 'Users')
@section('style')
<link href={{ asset("vendor/datatables/dataTables.bootstrap4.min.css") }} rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="row mb-2 mr-0 float-right">
        <a href="/portal/users/create" class="btn btn-primary">
          <span class="icon text-white align-content-center">
            <i class="fa fa-plus"></i>
            <span class="text">Add</span>
          </span>
        </a>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="users-list" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 20%">Created Date</th>
              <th style="width: 30%">ID</th>
              <th>Name</th>
              <th>Email</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection
@section('script')
<!-- Page level plugins -->
<script src={{ asset("vendor/datatables/jquery.dataTables.min.js") }}></script>
<script src={{ asset("vendor/datatables/dataTables.bootstrap4.min.js") }}></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function() {
        $('#users-list').dataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url:'/portal/users/datatables'
            },
            columns: [
              { data: 'created_at' },
              { data: 'id' },
              { data: 'name' },
              { data: 'email' },
            ],
            columnDefs: [{
                targets : 1,
                render: function (data) {
                    return '<a href="/portal/users/' + data + '">' + data + '</a>';
                }
            }]
        });
      });
</script>
@endsection