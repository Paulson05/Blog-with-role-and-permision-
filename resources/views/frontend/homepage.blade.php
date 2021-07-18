@extends('frontend.templete.default')
@section('title', '| homepage')
@section('content')
 @include('frontend.templete.partials.welcome')
    <section class="blog_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <!-- Single News Area -->
                    @forelse($posts as $post)

                    <div class="single_blog_area">
                        <div class="blog_post_thumb">
                            <a href="{{ route('getSinglePost',['post'=>$post->slug])  }}"><img src="upload/images/{{$post->image}}" alt="blog-post-thumb"></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <a href="#">9 Aug</a>
                                <span>3 min </span>
                            </div>
                        </div>
                        <div class="blog_post_content">
                            <a href="{{ route('getSinglePost',['post'=>$post->slug])  }}" class="blog_title">{{$post->title}}k 9 - 16 Aug 2019</a>
                             <p>{{$post->body}}</p>
                            <a href="{{ route('getSinglePost',['post'=>$post->slug])  }}">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>

                        </div>
                    </div>
                    @empty
                        <p class="text-danger text-center">no post found</p>
                    @endforelse


                </div>
                <div class="col-12 col-md-5 col-lg-4">
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
                                    <img src="upload/images/{{$post->image}}" alt="">
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
                                <li><a href="#">{{$item->name}}<span class="text-muted">({{count($item->posts)}})</span></a></li>
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
                            <ul>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Electronice</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Intimates</a></li>
                                <li><a href="#">Kids</a></li>
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Rompers</a></li>
                                <li><a href="#">Bras</a></li>
                                <li><a href="#">Shorts</a></li>
                                <li><a href="#">Bottom</a></li>
                                <li><a href="#">T-shirts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Shop Pagination Area -->
                    <div class="shop_pagination_area mt-5">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">8</a></li>
                                <li class="page-item"><a class="page-link" href="#">9</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
