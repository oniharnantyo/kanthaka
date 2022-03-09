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
              <div class="col-7">
                <div class="form-group">
                  <input type="text" class="form-control @if ($errors->has('image_url')) is-invalid @endif" id="image-input" name ="image_url" placeholder="http://example.com/image.png">
                  @if ($errors->has('image_url'))
                    <div class="invalid-feedback">
                      {{ $errors->first('image_url') }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-5">
                <div class="form-group">
                  <img class="img-fluid"
                       id = "image-preview" alt="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <textarea name="blog_content" placeholder="Content"></textarea>
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
            "http://www.kreilkamp.com/wp-content/uploads/2016/11/thumbnail-placeholder-500x334.jpg");
        $('#image-input').change(function () {
            if ($(this).val() !== '') {
                $('#image-preview').attr('src', $(this).val());
            } else {
                $('#image-preview').attr('src',
                    "http://www.kreilkamp.com/wp-content/uploads/2016/11/thumbnail-placeholder-500x334.jpg");
            }
        });
      });

      var ckeOptions = {
          entities: false,
          htmlEncodeOutput: false,
          htmlDecodeOutput: true,
          allowedContent: true
      };
      CKEDITOR.config.contentsCss = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css';
      CKEDITOR.replace('blog_content', ckeOptions);
      CKEDITOR.config.extraPlugins = 'justify';
  </script>
@endsection