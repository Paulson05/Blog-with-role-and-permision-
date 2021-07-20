@extends('frontend.templete.default')
@section('title', ' | singlepost')
@section('content')
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>{{$post->title}}</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">{{$post->title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Single Blog Post Area -->
    <section class="singl-blog-post-area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Blog Details Area -->
                    <div class="blog-details-area mb-50">
                        <!-- Image -->
                        <img class="mb-30" src="/upload/images/{{$post->image}}" alt="blog-img">

                        <!-- Blog Title -->
                        <h3 class="mb-30">Top 10 Handbags in 2019</h3>

                        <!-- Bar Area -->
                        <div class="status-bar mb-15">
                            <a href="#"><i class="icofont-user-male"></i> Jannatun</a>
                            <a href="#"><i class="icofont-ui-clock"></i> 16 Sep, 19</a>
                            <a href="#"><i class="icofont-tags"></i> Handbags</a>
                            <a href="#"><i class="icofont-speech-comments"></i> 3 Comments</a>
                        </div>

                        <!-- Single Blog Details Area -->

                                         <p>{{$post->body}}</p>


                        <img class="mb-3" src="/upload/images/{{$post->image}}" alt="">

                    </div>

                    <div class="comments-area">
                        <div class="comment_area mb-50 clearfix">
                            <h5 class="mb-4">{{$post->comments->count()}} Comments</h5>

                            <ol>
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">

                                    <ul class="children">
                                       @forelse($post->comments as $comment)
                                            <li class="single_comment_area">
                                                <div class="comment-wrapper clearfix">
                                                    <div class="comment-meta">
                                                        <div class="comment-author-img">
                                                            <img class="img-circle" src="img/partner-img/tes-2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="comment-content">
                                                        <h5 class="comment-author"><a href="#">{{$comment->name}}</a></h5>
                                                        <p>{{$comment->comments}}</p>
                                                        <a href="#" class="reply">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                           <lI class="single_comment_area" >
                                               <p>no coment yet</p>
                                           </lI>
                                           @endforelse


                                    </ul>
                                </li>


                            </ol>
                        </div>

                        <div class="contact_from mb-50">
                            <h5 class="mb-4">Leave a Comment</h5>

                            <form action="{{route('comment.post',['comments'=>$post->id])}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group mb-30">
                                            <input type="text" class="form-control" name="name" value="" placeholder="Name" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group mb-30">
                                            <input type="text" class="form-control" name="email" value="" placeholder="Email" tabindex="2">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-30">
                                            <textarea class="form-control" name="comments" cols="30" rows="7" placeholder="Comment" tabindex="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog_sidebar">
                        <!-- Search Post -->
                        <div class="widget-area search_post mb-30">
                            <h6>Search Post</h6>
                            <form action="#" method="get">
                                <input type="search" class="form-control" placeholder="Enter Keyword...">
                                <button type="submit" class="btn d-none">Submit</button>
                            </form>
                        </div>

                        <!-- Latest Post -->
                        <div class="widget-area latest_post mb-30">
                            <h6>Recent Post</h6>
                        @php
                            $posts = \App\Models\Post::orderBy('created_at', 'asc')->limit(3)->get();
                        @endphp


                        @forelse($posts as $post)
                            <!-- Recent Post -->
                                <div class="single_latest_post">
                                    <div class="post-thumbnail">
                                        <img src="/upload/images/{{$post->image}}" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="#">{{$post->title}}</a>
                                        <p>{{\Carbon\Carbon::parse($post->created_at)->format('M d y')}}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-secondary">no post yet</p>
                            @endforelse
                        </div>

                        <!-- Catagory -->
                        <div class="widget-area catagory_section mb-30">
                            <h6>TOTAL Category {{$post->count()}}</h6>
                            <ul>
                                @php
                                    $cats = \App\Models\Category::all()
                                @endphp@forelse($cats as $item)
                                    <li><a href="{{ route('getSinglePost',['post'=>$post->slug])  }}">{{$item->name}}<span class="text-muted">({{count($item->posts)}})</span></a></li>
                                @empty
                                    <p class="text-center text-secondary">empty </p>
                                @endforelse

                            </ul>
                        </div>

                        <!-- Achives -->
                        <div class="widget-area achive_section mb-30">
                            <h6>Achives</h6>
                            <ul>
                                <li><a href="#">September - 2019</a></li>
                                <li><a href="#">Auguest - 2019</a></li>
                                <li><a href="#">July - 2019</a></li>
                                <li><a href="#">June - 2019</a></li>
                                <li><a href="#">May - 2019</a></li>
                                <li><a href="#">April - 2019</a></li>
                            </ul>
                        </div>

                        <!-- Tages -->
                        <div class="widget-area tag_section mb-30">
                            <h6>Tags Cloud</h6>
                            @php
                                $tags = \App\Models\Tag::all();
                            @endphp
                            <ul>
                                @forelse($tags as $tag)
                                    <li><a href="#">{{$tag->name}}</a></li>
                                @empty
                                    <p class="text-center text-secondary"></p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
