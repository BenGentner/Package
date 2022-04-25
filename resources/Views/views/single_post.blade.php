@extends("/Webfactor/WfBasicFunctionPackage/views/master")

@section("content")
    <single_post
            v-bind:data="{{$post}}"
    ></single_post>
@endsection
