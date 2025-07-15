@extends('template_components.layout')

@section('content')
    <div style="margin: 150px 0px">
        <form action="{{ route('update_home', $user->id) }}" method="post">
            @csrf
            <label for="">Student Name</label>
            <input type="text" name="name" value="{{ $user->name }}">
            <br>
            <label for="">Student Email</label>
            <input type="text" name="email" value="{{ $user->email }}">
            <br>
            <button type="submit">Update Student</button>
        </form>
    </div>
@endsection
