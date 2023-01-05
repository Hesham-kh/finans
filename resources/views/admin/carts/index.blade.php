@extends('admin.admin')
@section('content')
    <div class="py-5">
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">product</th>
                    <th scope="col">price</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $cart->username }}</td>
                        <td>{{ $cart->product->name }}</td>
                        <td>{{ $cart->price }}</td>
                        <td>
                            <form action="{{ route('carts.destroy', $cart->id) }}" method="POST">
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
