<a href="{{ route('home') }}">Template home</a>
<a href="{{ route('about') }}">Template About</a>
<br> <br>
<h2>2<sup>nd</sup> Menu</h2>
<a href="{{ route('add_student') }}">Add Students</a>
<a href="{{ route('view_student') }}">View Students</a>

@yield('content')

<footer>
    <a href="">Copyright by template</a>
</footer>

@stack('scripts')
