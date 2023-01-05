@extends('admin.admin')
@section('content')
    <div class="py-5">
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">phone</th>
                    <th scope="col">email</th>
                    <th scope="col">description</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$contact->username}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->description}}</td>
                        <td>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
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
