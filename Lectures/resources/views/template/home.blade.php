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
        <h1>Home template page</h1>
        @verbatim
            <div id="app">{{ message }}</div> <br>
        @endverbatim
    @endsection

    @push('scripts')
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

        <script>
            const {
                createApp,
                ref
            } = Vue

            createApp({
                setup() {
                    const message = ref('Hello and welcome to vue!')
                    return {
                        message
                    }
                }
            }).mount('#app')
        </script>
    @endpush
</body>

</html>
