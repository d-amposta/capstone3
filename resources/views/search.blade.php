@extends('layout/master')

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-3 side_nav">
        @include('layout.timeline_nav')
    </div>
    <div class="col-xs-12 col-md-9">
        <div class="result_container">
            <div class='result_header'>
                <p>Found <strong>{{count($interests_query)}}</strong> users interested in <strong>{{$search}}</strong></p>
            </div>
            <div class="result_content">
                <div class="row">
                    @foreach($interests_query as $interest)
                        @include('layout.interest_template')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection