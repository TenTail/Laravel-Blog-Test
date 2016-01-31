@extends('layouts.master')

@section('brand', 'BLOG')

@section('content')    
<div class="container">
    @if (session('message'))
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <h1 class="text-center">{{ session('message') }}</h1>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Company
                    <strong>blog</strong>
                    <a href="{{ route('article.create') }}" class="btn btn-info">建立文章</a>
                </h2>
                <hr>
            </div>
        
            @foreach ($posts as $post)
                <div class="col-lg-12 text-center">
                    <h2> {{ $post->article_title }}
                        <br>
                        <small>{{ $post->updated_at->diffForHumans() }}</small>
                    </h2>
                    <p>{!! $post->article_content !!}</p>
                    <a href="{{ route('article.edit', $post->id) }}" class="btn btn-default btn-lg">Read More</a>
                    <hr>
                </div>
            @endforeach
            <!-- 頁數 -->
            <div class="text-center">
                {!! $posts->render() !!}
            </div>
            

            <!-- <div class="col-lg-12 text-center">
                <img class="img-responsive img-border img-full" src="img/slide-1.jpg" alt="">
                <h2>Post Title
                    <br>
                    <small>October 13, 2013</small>
                </h2>
                <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                <a href="#" class="btn btn-default btn-lg">Read More</a>
                <hr>
            </div>
            <div class="col-lg-12 text-center">
                <img class="img-responsive img-border img-full" src="img/slide-2.jpg" alt="">
                <h2>Post Title
                    <br>
                    <small>October 13, 2013</small>
                </h2>
                <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                <a href="#" class="btn btn-default btn-lg">Read More</a>
                <hr>
            </div>
            <div class="col-lg-12 text-center">
                <img class="img-responsive img-border img-full" src="img/slide-3.jpg" alt="">
                <h2>Post Title
                    <br>
                    <small>October 13, 2013</small>
                </h2>
                <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                <a href="#" class="btn btn-default btn-lg">Read More</a>
                <hr>
            </div>
            <div class="col-lg-12 text-center">
                <ul class="pager">
                    <li class="previous"><a href="#">&larr; Older</a>
                    </li>
                    <li class="next"><a href="#">Newer &rarr;</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </div>

</div>
<!-- /.container -->
@endsection