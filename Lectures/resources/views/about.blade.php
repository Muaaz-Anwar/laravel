<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
</head>
<body>
{{-- @include('components.header', ['name' => []]) --}}
@includeWhen(true, 'components.header', ['name' => ['one' => 'this is when']])
@includeUnless(true, 'components.header', ['name' => ['one' => 'this is unless']])

<div>
    <h1>About us</h1>
</div>

@include('components.footer')

</body>
</html>
