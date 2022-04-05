@extends('portal.layout.content')
@section('title', 'Blog')
@section('style')

@endsection
@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-center">
        <form style="width: 90%" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="form-group">
            <label class="form-label" for="title-input">Title</label>
            <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif" id="title-input"
              name="title" placeholder="Enter title" value={{$blog['title']}}>
            @if ($errors->has('title'))
            <div class="invalid-feedback">
              {{ $errors->first('title') }}
            </div>
            @endif
          </div>
          <div class="row">
            <div class="col-7">
              <div class="form-group">
                <label class="form-label" for="image-input">Thumbnail</label>
                <input type="file" class="form-control @if ($errors->has('image')) is-invalid @endif" id="image-input"
                  name="image">
                @if ($errors->has('image'))
                <div class="invalid-feedback">
                  {{ $errors->first('image') }}
                </div>
                @endif
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <img class="img-fluid" id="image-preview" alt="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea id="content-input" name="content" placeholder="Content">{!! $blog['content'] !!}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script>
  $(document).ready(function() {
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
          $('#image-preview').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }

    var blog = {!! json_encode($blog) !!};
    $('#image-preview').attr('src', "{{ asset('storage/images/' . $blog->thumbnail) }}");
          
    $("#image-input").change(function(){
      if ($(this)[0].files.length != 0) {
        readURL(this);
      }else {
        $('#image-preview').attr('src', "http://www.kreilkamp.com/wp-content/uploads/2016/11/thumbnail-placeholder-500x334.jpg");
      }
    });
  });

  ClassicEditor
    .create(document.querySelector( '#content-input' ))
    .catch( error => {
      console.error( error );
    });

</script>
@endsection