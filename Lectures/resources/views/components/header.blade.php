<a href="{{ route('/home') }}">Home</a>
<a href="{{ route('contact') }}">Contact Us</a>
<a href="{{ route('about') }}">About Us</a>
<a href="{{ route('blog') }}">Blog</a>
<a href="{{ route('user_1') }}">User 1 </a>
<a href="{{ route('user_2') }}">User 2</a>


    <ul>
        @forelse ($name as $key => $value)
            <li> {{ $key }} - {{ $value }}</li>
        @empty
            <h1>No value found</h1>
        @endforelse
    </ul>
