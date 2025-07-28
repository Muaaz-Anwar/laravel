@extends('layout')
@section('content')

    <div class="container">
        @if (session('success'))
            <div class="alert alert-warning" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->password }}
                        </td>
                        <td>
                            <a href="{{ route('edit_user', $user->id) }}" class="btn btn-warning"> Edit User</a>
                        </td>
                        <td>
                            <a href="{{ route('delete_user', $user->id) }}" class="btn btn-danger">Delete User</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $users->links() }}
            </ul>
        </nav>
    </div>
</body>
@endsection
