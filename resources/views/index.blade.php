@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ $firstPost->featured }}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{ $firstPost->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{route('single',['slug'=>$firstPost->slug])}}">{{ $firstPost->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                               {{ \Carbon\Carbon::parse($firstPost->created_at)->diffForHumans() }}
                                               <!--  thoi gian tạo bai post -->
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            @foreach($category as $k => $v)
                                             @if($v->id==$firstPost->category_id)
                                              <a href="{{route('category',['id'=>$v->id])}}">{{ $v->name }}</a>
                                              @endif 
                                            @endforeach
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">

            @foreach($post as $key => $value)
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ $value->featured }}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{ $value->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{route('single',['slug'=>$value->slug])}}">{{ $value->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                             <!-- {{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }} -->
                                             {{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y') }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            @foreach($category as $k => $v)
                                             @if($v->id==$value->category_id)
                                              <a href="{{route('category',['id'=>$v->id])}}">{{ $v->name }}</a>
                                              @endif 
                                            @endforeach
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            @endforeach
        
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">

                @foreach($category as $key => $value)    
                   
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $value->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach($value->post as $k => $v )
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $v->featured }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{route('single',['slug'=>$v->slug])}}">{{ $v->title }}</a></h6>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
           @endforeach
             
            </div>
            </div>
        </div>
    </div>

@endsection('content')
