@extends("/Webfactor/WfBasicFunctionPackage/views/master")

@section("content")
    <div id="app">
        <single_gallery
            v-bind:data="{{$gallery}}"
        ></single_gallery>
    </div>

    <script defer src="{{(asset('js/Webfactor/WfBasicFunctionPackage/app.js'))}}"></script>
@endsection
