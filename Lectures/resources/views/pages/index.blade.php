@extends('template_components.layout')


@section('content')
<h1>This is index template page</h1>
<h1>{{ session('success') }}</h1>
<table width="100%">

    @if (!$value)
    @if ($users->count() >= 1)
    <tr>
        <td>
            <h3>Id</h3>
        </td>
        <td>
            <h3>Name</h3>
        </td>
        <td>
            <h3>Email</h3>
        </td>
        <td>
            <h3>City</h3>
        </td>
        <td>
            <h3>Created at</h3>
        </td>
        <td>
            <h3>Updated at</h3>
        </td>
        <td>
            <h3>Show More</h3>
        </td>
        <td>
            <h3>Update</h3>
        </td>
        <td>
            <h3>Delete</h3>
        </td>
    </tr>
    @foreach ($users as $user)
    <tr style="height:60px;">
        <td width="1%">{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->city_name }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td><a style="width:160px !important;padding:10px 50px; background-color:rgb(0, 255, 0);border-radius:6px; color:black"
                href="controller/{{ $user->id }}">Show</a></td>
        <td><a style="width:160px !important;padding:10px 50px; background-color:blue;border-radius:6px; color:black"
                href="{{ route('edit_student', $user->id) }}">Edit</a></td>
        <td><a style="width:160px !important;padding:10px 50px; background-color:red;border-radius:6px; color:black"
                href="deletecontroller/{{ $user->id }}">Delete</a></td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="6" align="center" style="background-color:red; padding-top:20px">
            <h2>No data Found</h2>
        </td>
    </tr>
    @endif
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    {{ $users->links() }}
  </ul>
</nav>

    @else
    <table width="100%">
    <tr>
        <td>
            <h3>Id</h3>
        </td>
        <td>
            <h3>Name</h3>
        </td>
        <td>
            <h3>Email</h3>
        </td>
        <td>
            <h3>City</h3>
        </td>
        <td>
            <h3>Created at</h3>
        </td>
        <td>
            <h3>Updated at</h3>
        </td>
        <td>
            <h3>Show More</h3>
        </td>
        <td>
            <h3>Update</h3>
        </td>
        <td>
            <h3>Delete</h3>
        </td>
    </tr>
    <tr style="height:40px;">
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->city_name }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td><a style="width:160px !important;padding:10px 50px; background-color:rgb(0, 255, 0);border-radius:6px; color:black"
                href="{{ route('view_student') }}">Back</a></td>
        <td><a style="width:160px !important;padding:10px 50px; background-color:blue;border-radius:6px; color:black"
                href="{{ route('edit_student', $user->id) }}">Edit</a></td>
        <td><a style="width:160px !important;padding:10px 50px; background-color:red;border-radius:6px; color:black"
                href="deletecontroller/{{ $user->id }}">Delete </a></td>
    </tr>
    @endif

</table>
<br>
@endsection
