@extends('template_components.layout')


@section('content')
    <div>
        <h1>{{ session('success') }}</h1>
    </div>
    <div style="margin: 150px 0px">
        <form action="{{ route('add_home') }}" method="post">
            @csrf
            <label for="">Student Name</label>
            <input type="text" name="name" required>
            <br>
            <label for="">City</label>
            <select name="city" id="" required>
                <option value="" selected disabled>Select</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                @endforeach
            </select> <br>
            <label for="">Student Email</label>
            <input type="text" required name="email">
            <br>
            <button type="submit">Add Student</button>
        </form>
    </div>
@endsection
