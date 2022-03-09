@extends('portal.layout.main')
<body id="page-top">
  <div id="wrapper">
  @include('portal.layout.sidebar')
  <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
      @include('portal.layout.navbar')

      <div class="container-fluid">
        @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
        @endif


        @if ($message = Session::get('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
        @endif


        @if ($message = Session::get('warning'))
          <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
        @endif


        @if ($message = Session::get('info'))
          <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
        @endif


        @if ($errors->any())
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ $errors }}
          </div>
        @endif
      </div>

        @yield('content')
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <form action="/admin/logout" method="POST">
            @csrf
            <button class="btn btn-primary" href="login.html">Logout</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src={{asset("vendor/jquery/jquery.min.js")}}></script>
  <script src={{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>

  <!-- Core plugin JavaScript-->
  <script src={{asset("vendor/jquery-easing/jquery.easing.min.js")}}></script>

  <!-- Custom scripts for all pages-->
  <script src={{asset("js/sb-admin-2.min.js")}}></script>
@yield('script')
</body>