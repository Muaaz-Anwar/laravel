@extends('template_components.layout')


    @section('content')
        <h1>This is index template page</h1>
        <table width="40%">
            <tr>
                <td><h3>Name</h3></td>
                <td><h3>Email</h3></td>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="controller/{{ $user->id }}">{{ $user->id }}</a></td>
            </tr>
            @endforeach
        </table>

        </ol>
    @endsection
