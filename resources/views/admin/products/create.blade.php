@extends('admin.admin')
@section('content')


<h1>Create proudect</h1>


<div class="py-5">
<form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <label for="img" class="form-label">اختر صوره المنتج</label>
    <input type="file" class="form-control" id="img" name="product_img" >
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">اسم المنتج</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>
  <div class="mb-3">
   <label for="price" class="form-label">السعر القديم</label>
   <input type="namber" class="form-control" name="oldPrice" id="price">
 </div>
  <div class="mb-3">
    <label for="pricenew" class="form-label">السعر الجديد</label>
    <input type="namber" class="form-control" name="newPrice" id="pricenew">
  </div>
   <div class="mb-3">
  <label class="catagory" for="">الصنف</label>
  <select class="form-select" aria-label="Default select example" name="category">
  <option selected>اختر التصنيف</option>
  <option selected disabled value="">اختر...</option>
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
</select>
  </div> 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection


