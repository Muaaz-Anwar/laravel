<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('template_components.layout')

@section('content')
<h1>About template page</h1>
@endsection

@push('scripts')
 <script>
    alert("This is about page")
 </script>
@endpush

@prepend('scripts')
 <script>
    alert("this will run just before the push script")
 </script>
@endprepend
</body>
</html>
