<h1>This is js</h1>

@php
    $name = "Muaaz Anwar";
    $users = ["user 1" , "user 2" , "user 3 "];
@endphp
<script>
    var name = @json($name);
    console.log(name);
    // var users = @json($users);

    var users = {{ Js::from($users) }};
    users.forEach(function (value) {
        console.log('this is '+value)
    });
</script>

