@extends('template_components.layout')

@section('content')
    <div style="margin: 150px 0px">
        <form action="{{ route('update_home', $user->id) }}" method="post">
            @csrf
            <label for="">Student Name</label>
            <input type="text" name="name" value="{{ $user->name }}">
            <br>
            <select name="city" id="">
                <option value={{ $user->city }} selected readonly>{{ $user->city_name }}</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                @endforeach
            </select> <br>
            <label for="">Student Email</label>
            <input type="text" name="email" value="{{ $user->email }}">
            <br>
            <button type="submit">Update Student</button>
        </form>
    </div>
@endsection
