@extends('layout.main')
@section('title', 'Blog')
@section('content')
  <div class="site-section">
    <div class="container">
      <div class="row mb-5 mt-5">
        <div class="col-12 text-center">
          <h2 class="section-title mb-3">Blog</h2>
        </div>
      </div>

      <div class="row" data-aos="fade-up">
        @foreach($blogs as $blog)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4 px-2">
            <div class="card border-light no-border px-2">
              <img src={{$blog->thumbnail}} alt="thumbnail" class="card-img-top d-block mx-auto mb-3" style="height: 200px; max-width: 300px">
              <h5 class="card-title px-2"><a href="/blog/{{$blog->slug}}">{{$blog->title}}</a></h5>
              <div class="card-subtitle text-muted px-2">{{$blog->created_at}}</div>
              <p class="card-text px-2">{!!Str::limit($blog->content, 200)!!}</p>
            </div>
          </div>
        @endforeach
      </div>
      <div class="row justify-content-center">
        {{ $blogs->links() }}
      </div>
    </div>
  </div>
@endsection
