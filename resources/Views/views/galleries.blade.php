@extends("/Webfactor/WfBasicFunctionPackage/views/master")

@section("content")
    <div id="app">
        <galleries></galleries>
    </div>

    <script defer src="{{(asset('js/Webfactor/WfBasicFunctionPackage/app.js'))}}"></script>
@endsection
