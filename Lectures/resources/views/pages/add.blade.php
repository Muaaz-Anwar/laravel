@extends('template_components.layout')


@section('content')
    <div>
        <h1>{{ session('success') }}</h1>
    </div>
    <div style="margin: 150px 0px">
        <form action="addcontroller" method="post">
            @csrf
            <label for="">Student Name</label>
            <input type="text" name="name">
            <br>
            <label for="">Student Email</label>
            <input type="text" name="email">
            <br>
            <button type="submit">Add Student</button>
        </form>
    </div>
@endsection
