@extends('main')

@section("content")
<form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="file">file to s3 bucket</label>
      <input type="file" name="file" class="form-control-file" id="file">
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>
@endsection