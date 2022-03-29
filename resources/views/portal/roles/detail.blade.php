@extends('portal.layout.content')
@section('title', 'Roles')
@section('style')
<link href={{ asset("css/select2.min.css") }} rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-center">
        <form style="width: 40%" method="POST">
          @csrf
          <div class="form-group">
            <label class="form-label" for="name-input">Name</label>
            <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name-input"
              name="name" value={{$role['name']}} placeholder="Enter name">
            @if($errors->has('name'))
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <label class="form-label" for="permission-input">Permissions</label>
            <select class="form-control @if($errors->has('permission')) is-invalid @endif" id="permission-input"
              name="permission[]" placeholder="Enter permissions" multiple>
              @foreach ($permissions as $permission)
              <option value="{{ $permission['id']}}">{{ $permission['name']}}</option>
              @endforeach
            </select>
            @if ($errors->has('permission'))
            <div class="invalid-feedback">
              {{ $errors->first('permission') }}
            </div>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src={{ asset("js/select2.min.js") }}></script>
<script>
  var roleHasPermissions = {!! json_encode($roleHasPermissions) !!};

  var selectedPermissionInput = [];
  for( var key in roleHasPermissions ) {
   selectedPermissionInput.push(roleHasPermissions[key].toString());
  }  

  $("#permission-input").val(selectedPermissionInput)
  $("#permission-input").select2({
    width: '100%',
    multiple:true,
    placeholder:"Enter permissions",
  });

</script>
@endsection