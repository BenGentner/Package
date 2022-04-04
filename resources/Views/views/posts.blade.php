@extends("/Webfactor/WfBasicFunctionPackage/views/master")

@section("content")
    <div id="app">
        <posts_grid></posts_grid>
    </div>

    <script defer src="{{(asset('js/Webfactor/WfBasicFunctionPackage/app.js'))}}"></script>
@endsection

