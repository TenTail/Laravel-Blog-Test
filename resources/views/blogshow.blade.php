@extends('layouts.master')

@section('brand', 'BLOG')

@section('content') 
<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Company
                    <strong>blog</strong>
                </h2>
                <hr>
            </div>

            <div class="col-lg-12 text-center">
                <h2> {{ $post->article_title }}
                    <br>
                    <small>{{ $post->updated_at }}</small>
                </h2>
                <p>{!! $post->article_content !!}</p>
                <hr>
            </div>

        </div>	
    </div>
</div>
@endsection