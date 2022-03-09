@extends('portal.layout.content')
@section('title', 'Blog')
@section('style')
  <link href={{ asset("vendor/datatables/dataTables.bootstrap4.min.css") }} rel="stylesheet">
@endsection
@section('content')
      <div class="container-fluid">
          <div class="card shadow mb-4">
              <div class="card-body">
                  <div class="row mb-2 mr-0 float-right">
                    <a href="/admin/banner/create" class="btn btn-primary">
                      <span class="icon text-white align-content-center">
                        <i class="fa fa-plus"></i>
                        <span class="text">Add</span>
                      </span>
                    </a>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="blog-list" width="100%" cellspacing="0">
                          <thead>
                          <tr>
                              <th style="width: 20%">Created Date</th>
                              <th style="width: 30%">ID</th>
                              <th>Title</th>
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
        $('#blog-list').dataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url:'/admin/banner/list'
            },
            columns: [
              { data: 'created_at' },
              { data: 'id' },
              { data: 'title' }
            ],
            columnDefs: [{
                targets : 1,
                render: function (data) {
                    return '<a href="/admin/banner/' + data + '">' + data + '</a>';
                }
            }]
        });
      });
  </script>
@endsection