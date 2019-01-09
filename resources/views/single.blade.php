@extends('layouts.frontend')
@section('content')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{$post[0]->title}}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{ $post[0]->featured }}" alt="seo">
                    </div>

                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                            <div class="post__author-name fn">
                                <a href="#" class="post__author-link">
                                @foreach($user as $k => $v)
                                  @if($v->id==$post[0]->user_id)
                                      {{$v->name}}
                                  @endif 
                                @endforeach

                                </a>
                            </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{ \Carbon\Carbon::parse($post[0]->created_at)->format('d/m/Y') }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                @foreach($category as $key => $value)
                                  @if($value->id==$post[0]->category_id)
                                     <a href="{{route('category',['id'=>$value->id])}}">{{$value->name}}</a>
                                   @endif
                                @endforeach   
                            </span>

                        </div>

                        <div class="post__content-info">

                            <?php echo htmlspecialchars_decode($post[0]->content) ?>  
                           <br>
                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                	@foreach($post[0]->tag as $k => $v)
                                     <a href="{{route('tag',['id'=>$v->id])}}" class="w-tags-item">{{$v->tag}}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials">Share
                        <div class="addthis_inline_share_toolbox_u5iy"></div>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        @foreach($pro as $k => $v)
                            @if($v->user_id==$post[0]->user_id)
                                <img src="{{$v->avatar}}" alt="Author">
                            @endif 
                        @endforeach
                        
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">
                                @foreach($user as $k => $v)
                                  @if($v->id==$post[0]->user_id)
                                      {{$v->name}}
                                  @endif 
                                @endforeach
                            </h5>
                            <p class="author-info">SEO Specialist</p>
                        </div>
                        <p class="text">
                            @foreach($pro as $k => $v)
                                  @if($v->user_id==$post[0]->user_id)
                                      {{$v->about}}
                                  @endif 
                            @endforeach
                        </p>
                        <div class="socials">

                            <a href="#" class="social__item">
                                <img src="{{ asset('public/app/svg/circle-facebook.svg') }}" alt="facebook">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('public/app/svg/twitter.svg') }}" alt="twitter">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('public/app/svg/google.svg') }}" alt="google">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('public/app/svg/youtube.svg') }}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">
                    
                    @if(!empty($post_prev))
                    <a href="{{ route('single',['slug'=>$post_prev[0]->slug]) }}" class="btn-next-wrap">
                        <div class="btn-content">
                            <div class="btn-content-title">Previous Post</div>
                            <p class="btn-content-subtitle">{{$post_prev[0]->title}}</p>
                        </div>
                        <svg class="btn-next">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                    @endif
                    @if(!empty($post_next))
                    <a href="{{ route('single',['slug'=>$post_next[0]->slug]) }}" class="btn-prev-wrap">
                        <svg class="btn-prev">
                            <use xlink:href="#arrow-left"></use>
                        </svg>
                        <div class="btn-content">
                            <div class="btn-content-title">Next Post</div>
                            <p class="btn-content-subtitle">{{$post_next[0]->title}}</p>
                        </div>
                    </a>
                    @endif
                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                </div>

                <div class="row">

                </div>


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                          @foreach($tag as $k => $v)
                            <a href="{{route('tag',['id'=>$v->id])}}" class="w-tags-item">{{$v->tag}}</a>
                          @endforeach  
                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div>

@endsection('content')