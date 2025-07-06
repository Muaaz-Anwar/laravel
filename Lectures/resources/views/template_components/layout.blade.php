<a href="{{ route('home') }}">Template home</a>
<a href="{{ route('about') }}">Template About</a>

@yield('content')

<footer>
    <a href="">Copyright by template</a>
</footer>

@stack('scripts')
