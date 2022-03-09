@extends('layout.main')
@section('title', $blog->title)
@section('content')
  <div class="site-section">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="row mt-5">
          <div class="col-10 mx-auto text-center">
            <h4 class="mb-1 px-2 blog-title">{{ $blog->title }}</h4>
            <p class="mb-5">Dipublikasikan pada : {{ $blog->created_at }}</p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-9">
            <img class="img-fluid d-block mx-auto mb-5" src={{ $blog->thumbnail }} />
          </div>
          <div class="col-md-9 mx-4 mx-md-0 mx-lg-0">
            {!! $blog->content !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
