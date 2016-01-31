@extends('layouts.master')

@section('brand', 'BLOG')

@section('content')  
{{-- error --}}
@if ($errors->any())
	<div class="alert alert-danger text-center" role="alert">
		<strong>ERROR!!</strong>
		@foreach ($errors->all() as $error)
			{{ $error }}
		@endforeach
	</div>
@endif

<div class="container">
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">建立新文章</h2>
                <hr>
            </div>
			
			<div class="col-lg-12">
				{!! Form::open(['route' => 'article.store', 'method' => 'POST', 'id' => 'contactForm', 'novalidate'])!!}
					<div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        {!! Form::label('article_title', '標題') !!}
                        {!! Form::text('article_title', null, ['id' => 'article_title', 'class' => 'form-control', 'placeholder' => '標題', 'data-validation-required-message' => '請輸入文章標題', 'required']) !!}
                        <p class="help-block text-danger"></p>
                    </div>
	                </div>
	                <div class="row control-group">
	                    <div class="form-group col-xs-12 floating-label-form-group controls">
	                        {!! Form::label('article_content', '內文') !!}
	                        {!! Form::textarea('article_content', null, ['id' => 'article_content', 'rows' => 5, 'class' => 'form-control', 'placeholder' => '內文', 'data-validation-required-message' => '請輸入文章內文', 'required']) !!}
	                        <p class="help-block text-danger"></p>
	                    </div>
	                </div>
	                <div class="row control-group">
	                    <div class="form-group col-xs-12 floating-label-form-group controls">
	                        <p style="font-size: 1.5em; color: #555; margin-bottom: 0">設定為精選文章？</p>
	                        {!! Form::radio('feature', 1, false) !!} 是
	                        {!! Form::radio('feature', 0, true) !!} 否
	                        <p class="help-block text-danger"></p>
	                    </div>
	                </div>
	                <br>
	                <div id="success"></div>
	                <div class="row">
	                    <div class="form-group col-xs-12">
	                        {!! Form::submit('送出', ['class' => 'btn btn-success']) !!}
	                        <a href="{{ route('article.index') }}" class="btn btn-primary">取消</a>
	                    </div>
	                </div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection