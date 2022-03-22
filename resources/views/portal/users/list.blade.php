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
              <th>Action</th>
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
<script src={{ asset("js/bootbox.min.js") }}></script>
<script src={{ asset("js/flash.min.js") }}></script>

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
          { data: 'action' },
        ],
        columnDefs: [
          {
            targets : 1,
            render: function (data) {
                return '<a href="/portal/users/' + data + '">' + data + '</a>';
            }
          },
          {
            targets : 4,
            render: function (data, type, row) {
              return '<a href="javascript:void(0)" data-id="'+row.id+'" class="btn btn-danger btn-sm btn-delete">Delete</a>';
            }
          }
      ]
    });
  });

  $(document).on('click', '.btn-delete', function(e){
    var id = $(this).attr("data-id");

    bootbox.confirm({
      message: "Are you sure to delete the user?",
      buttons: {
        confirm: {
          label: 'Yes',
          className: 'btn-success'
        },
        cancel: {
          label: 'No',
          className: 'btn-danger'
        }
      },
      callback: function (result) {
        if (result) {
          $.ajax({
            url: 'portal/users/delete'+id,
            type: 'DELETE',
            success: function(data, status, xhr) {
              flash('User deleted successfully',{
                'autohide' : true,
                'bgColor' : '#5E9DE6'
              });
            }
          });
        }
        console.log('This was logged in the callback: ' + result);
      }
    });
  });
</script>
@endsection