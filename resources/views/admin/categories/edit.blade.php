@extends('admin.admin')
@section('content')


<h1>Create Category</h1>


<div class="py-5">
<form method="POST" action="{{route('categories.update',$category->id)}}" >
@csrf
 @method('patch')
  <div class="mb-3">
    <label for="name" class="form-label">اسم التصنيف</label>
    <input type="text" class="form-control" name="name" value="{{$category->name}}" id="name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection


