<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
</head>

<body>
    {{-- $name = ["muaaz", "anwar", "Furqan", "akasha", "zain"]; --}}
    @php
        $name = ["one wala 1" => "muaaz","two" => "anwar", "three" => "Furqan", "four" => "akasha", "five" => "zain"];
        @endphp
    @include('components.header' , $name)

    <h1>Index page </h1>

    {{ 5 + 2 }}

    <br>

    {{ ' hello world' }}

    <br>

    {!! '<h1> Hello World </h1> <br> <h2>This is h2 </h2>' !!}

    <br>

    {{-- {!! "<script> alert('this is java script') </script>" !!} --}}

    <br>

    @php
        $users = ['Muaaz', 'Anwar', 'Habib', 'Danial'];
    @endphp
    <ul>
        @foreach ($users as $item)
            @if ($loop->first)
                <li style="color: red;">{{ $loop->index }} {{ $item }} </li>
            @else
                <li>{{ $loop->index }} {{ $item }} </li>
            @endif
        @endforeach
    </ul>

    @include('components.footer')
    @includeIf('components.footer-2')
</body>

</html>
