<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
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
