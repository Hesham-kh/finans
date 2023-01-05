@extends('admin.admin')
@section('content')
    <div class="py-5">
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">category</th>
                    <th scope="col">Old price</th>
                    <th scope="col">New price</th>
                    <th scope="col">Img</th>
                    <th scope="col">Update</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->oldPrice}}</td>
                        <td>{{$product->newPrice}}</td>
                        <td><img src="/images/products/{{$product->product_img}}" width="200" alt=""></td>
                        <td><a href="{{url('admin/products/'.$product->id.'/edit')}}" class="btn btn-info">تعديل</a></td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
