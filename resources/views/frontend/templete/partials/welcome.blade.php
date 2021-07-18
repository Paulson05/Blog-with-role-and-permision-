<section class="welcome_area">
    <div class="welSlideTwo owl-carousel">

        @php
        $posts = \App\Models\Post::orderBy('created_at', 'asc')->limit(3)->get();;
        @endphp
           @forelse($posts as $post)
        <!-- Single Slide -->
        <div class="single_slide home-3 bg-img" style="background-image: url(upload/images/{{$post->image}});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="welcome_slide_text text-center">
                            <p data-animation="fadeInUp" data-delay="100ms">{{$post->title}}</p>
                            <a href="{{ route('getSinglePost',['post'=>$post->slug])  }}">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
               @empty
               <p class="text-center text-danger">no post yet</p>
               @endforelse
    </div>
</section>
