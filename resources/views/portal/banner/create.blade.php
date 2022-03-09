@extends('portal.layout.content')
@section('title', 'Blog')
@section('style')
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css"
        type="text/css" media="screen" charset="utf-8">
@endsection
@section('content')
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-center">
          <form style="width: 80%" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif" id="title-input"  name = "title" placeholder="Enter title">
              @if ($errors->has('title'))
                <div class="invalid-feedback">
                  {{ $errors->first('title') }}
                </div>
              @endif
            </div>
            <div class="row">
              <div class="col-12 justify-content-center">
                <div class="form-group">
                  <input type="text" class="form-control @if ($errors->has('image_url')) is-invalid @endif" id="image-input" name ="image_url" placeholder="http://example.com/image.png">
                  @if ($errors->has('image_url'))
                    <div class="invalid-feedback">
                      {{ $errors->first('image_url') }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12">
                  <div class="form-group text-center">
                    <img class="img-fluid"
                         id = "image-preview" alt="">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <textarea name="banner_content" placeholder="Content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/plugins/justify/plugin.js"></script>
  <script>
      $(document).ready(function() {
        $('#image-preview').attr('src',
            "http://www.nebero.com/wp-content/uploads/2014/05/placeholder.jpg");
        $('#image-input').change(function () {
            if ($(this).val() !== '') {
                $('#image-preview').attr('src', $(this).val());
            } else {
                $('#image-preview').attr('src',
                    "http://www.nebero.com/wp-content/uploads/2014/05/placeholder.jpg");
            }
        });
      });

      var ckeOptions = {
          entities: false,
          htmlEncodeOutput: false,
          htmlDecodeOutput: true
      };

      CKEDITOR.replace('banner_content', ckeOptions);
      CKEDITOR.config.extraPlugins = 'justify';
  </script>
@endsection