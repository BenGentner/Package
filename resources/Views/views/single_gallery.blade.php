@extends("/Webfactor/WfBasicFunctionPackage/views/master")

@section("content")
    <single_gallery
            v-bind:data="{{$gallery}}"
    ></single_gallery>
@endsection
