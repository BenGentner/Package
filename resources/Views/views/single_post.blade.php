@extends("master")

@section("content")
    <div id="app">
        <single_post
            v-bind:data="{{$post}}"
        ></single_post>
    </div>

    <script defer src="{{(asset('js/Webfactor/WfBasicFunctionPackage/app.js'))}}"></script>
@endsection
