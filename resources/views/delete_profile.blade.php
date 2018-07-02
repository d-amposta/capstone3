@extends('layout/master')

@section('content')
@include("layout.profile_header");

<div class="row">
    <div class="col-sm-7 site_content">
        <p>Are you sure you want to delete your account?</p>
        <form method="POST" action="">
        {{csrf_field()}}
            <input type="submit" name="delete" value="Yes. I want to delete my account." class="btn btn-danger"></input>
        </form>
        <a href='{{url("edit_profile")}}'><button class="btn btn-default">No</button></a>
    </div>
</div>
@endsection