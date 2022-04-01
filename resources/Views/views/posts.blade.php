{{--<html>--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
{{--    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}

@extends("master")

@section("content")
    <div id="app">
        <posts_grid></posts_grid>
    </div>

    <script defer src="{{(asset('js/Webfactor/WfBasicFunctionPackage/app.js'))}}"></script>
@endsection
{{--</html>--}}

