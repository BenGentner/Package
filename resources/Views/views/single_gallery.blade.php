@extends("/Webfactor/WfBasicFunctionPackage/master")

@section("content")
    <single_gallery
            v-bind:data="{{$gallery}}"
    ></single_gallery>
@endsection
