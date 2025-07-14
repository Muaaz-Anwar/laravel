@extends('template_components.layout')


    @section('content')
        <h1>This is index template page</h1>
        <table width="100%">
            <tr>
                <td><h3>Name</h3></td>
                <td><h3>Email</h3></td>
            </tr>
            @if ($users != '')
            @foreach ($users as $user)
            <tr style="height:40px;">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a style="width:160px !important;padding:10px 50px; background-color:rgb(0, 255, 0);border-radius:6px; color:black" href="controller/{{ $user->id }}">{{ $user->id }}</a></td>
            </tr>
            @endforeach
            @endif
            @if ($user)
            <tr style="height:40px;">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a style="width:160px !important;padding:10px 50px; background-color:rgb(0, 255, 0);border-radius:6px; color:black" href="{{ route('p_home') }}">Back</a></td>
            </tr>
            @endif

        </table>

        </ol>
        <br>
    @endsection
