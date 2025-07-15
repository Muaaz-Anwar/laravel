@extends('template_components.layout')


@section('content')
<h1>This is index template page</h1>
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
    @if (!$value)
    @if ($users->count() >= 1)
    @foreach ($users as $user)
    <tr style="height:40px;">
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td><a style="width:160px !important;padding:10px 50px; background-color:rgb(0, 255, 0);border-radius:6px; color:black"
                href="controller/{{ $user->id }}">Show</a></td>
                <td><a style="width:160px !important;padding:10px 50px; background-color:blue;border-radius:6px; color:black"
                href="updatecontroller/{{ $user->id }}">Update</a></td>
                 <td><a style="width:160px !important;padding:10px 50px; background-color:red;border-radius:6px; color:black"
                href="deletecontroller/{{ $user->id }}">Delete User</a></td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="6" align="center" style="background-color:red; padding-top:20px">
            <h2>No data Found</h2>
        </td>
    </tr>
    @endif


    @else
    <tr style="height:40px;">
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td><a style="width:160px !important;padding:10px 50px; background-color:rgb(0, 255, 0);border-radius:6px; color:black"
                href="{{ route('view_student') }}">Back</a></td>
                <td><a style="width:160px !important;padding:10px 50px; background-color:blue;border-radius:6px; color:black"
                href="updatecontroller/{{ $user->id }}">Update</a></td>
                 <td><a style="width:160px !important;padding:10px 50px; background-color:red;border-radius:6px; color:black"
                href="deletecontroller/{{ $user->id }}">Delete User</a></td>
    </tr>
    @endif


</table>

</ol>
<br>
@endsection
