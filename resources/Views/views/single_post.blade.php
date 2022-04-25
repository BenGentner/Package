@extends("/Webfactor/WfBasicFunctionPackage/master")

@section("content")
    <single_post
            v-bind:data="{{$post}}"
    ></single_post>
@endsection
