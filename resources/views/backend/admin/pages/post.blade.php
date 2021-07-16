@extends('backend.admin.templetes.defaults')
@section('title', '| post')
@section('content')

    <div class="container">
        @include('backend.admin.templetes.partials.headerpanel')
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Post</h4>
                            </div>
                            <div class="col-4 text-right">

                                <button type="button" class="btn btn-primary btn-sm fa fa-plus-square-o" data-toggle="modal" data-target="#exampleModal">

                                </button>
                            </div>
                            <div  class="modal  fade pt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Creat Post</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="{{route('post.store')}}" method="post" enctype= "multipart/form-data" >
                                                @csrf

                                                <div class="row">

                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Title</strong>
                                                            <input type="text" name="title" class="form-control" placeholder="email">

                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Slug</strong>
                                                            <input type="text" name="slug" class="form-control" placeholder="slug">

                                                        </div>

                                                    </div>



                                                    <div class="col-xs-12 col-sm-12 col-md-12 border-light " >
                                                        <div class="form-group"style="border: 1px solid red !important; height: 120px !important;" >
                                                            <strong>Category:</strong>
                                                            @php
                                                            $categories = \App\Models\Category::all();
                                                            @endphp

                                                            <div class="form-check form-check-inline" >
                                                            @foreach($categories as $category)
                                                            <label class="form-check-label"   >
                                                                <input class="form-check-input" type="checkbox" name="category_id" value="{{$category->id}}">
                                                                <span class="form-check-sign"></span>
                                                                {{$category->name}}
                                                            </label>
                                                                @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 border-dark" style="border: 1px solid red !important; height: 120px !important;">


                                                        <div class="form-group ">
                                                            <strong>Tags:</strong><br>
                                                            @php
                                                            $tags = \App\Models\Tag::all();
                                                            @endphp
{{--                                                                                    <select name="name[]" id="cars" multiple class="form-control custom-select">--}}
{{--                                                                                      --}}


{{--                                                                                            <option value="{{$tag->id}}"></option>--}}
{{--                                                                                        @endforeach--}}
{{--                                                                                    </select>--}}
                                                            <div class="form-check form-check-inline" >
                                                                @foreach($tags as $tag)
                                                                <label class="form-check-label"  >
                                                                    <input class="form-check-input" name="name" type="checkbox" value="{{$tag->id}}">
                                                                    <span class="form-check-sign"></span>
                                                                    {{$tag->name}}
                                                                </label>
                                                                @endforeach
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="col-md-6">
                                                            <h4 class="card-title">Regular Image</h4>
                                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail">
                                                                    <img src="../../assets/img/image_placeholder.jpg" alt="...">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                <div>
                                                                              <span class="btn btn-rose btn-round btn-file">
                                                                                  <span class="fileinput-new">Select image</span>
                                                                                  <span class="fileinput-exists">Change</span>
                                                                                  <input type="file" name="image" />
                                                                              </span>
                                                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>body</strong>
                                                            <textarea style="border: 1px solid red !important;"  id="mytextarea" cols="10" rows="5" placeholder="body" class="form-control" name="body">

                                                            </textarea>

                                                        </div>

                                                    </div>




                                                    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                                        <button type="submit" class="btn btn-primary">Post</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                    </div>

                                </div>




                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    S/N
                                </th>


                                <th>
                                  title
                                </th>
                                <th>
                                    slug
                                </th>
                                <th>
                                   photo
                                </th>
                                <th>
                                    category id
                                </th>
                                <th>
                                   action
                                </th>

                                </thead>

                                    @php
                                    $posts = \App\Models\Post::all();
                                    @endphp

                                <tbody>
                                                                @foreach($posts as $post)
                                <tr>
                                    <td>
                                                                                {{$loop->iteration}}

                                    </td>

                                    <td>
                                                                                {{$post->title}}
                                    </td>
                                    <td>
                                        {{$post->slug}}
                                    </td>
                                    <td>

                                        <img  src ="/upload/images/{{$post->image}}" height= "70px;" width = "80px;">


                                    </td>
                                    <td>
                                        {{$post->category_id}}
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-primary btn-sm fa fa-edit" data-toggle="modal" data-target="#example2Modal">

                                        </button>

                                        <form style="display: inline-block" method="post" action="" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger  p-0"><i class="btn btn-danger btn-sm fa fa-trash" ></i></button>
                                        </form>
                                    </td>
                                </tr>
                                                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            @php
                                $posts = \App\Models\Post::all();
                            @endphp
                            @foreach($posts as $post)
                            <form method="post" action="{{route('post.edit', $post->id)}}" #myEdit{{$post->id}}>
                                @method('PUT')
                                @csrf
                                <div class="modal fade pt-5" id="example2Modal" data-target="#myEdit{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                                    <div class="modal-dialog mt-2">
                                        <div class="modal-content mt-5">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body mt-5">

                                                    <div class="row">


                                                        <div class="col-md-12 mb-3">
                                                            <label for="email_address">name</label>
                                                            <input type="email" class="form-control" id="email_address" name="name" placeholder="tag name" value="{{$post->title}}">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="email_address">category id</label>
                                                            <input type="email" class="form-control" id="email_address" name="category" placeholder="category id" value="{{$post->category_id}}">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <div class="col-md-6">
                                                                <h4 class="card-title">Regular Image</h4>
                                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail">
                                                                        <img  src ="/upload/images/{{$post->image}}" height= "70px;" width = "80px;">

                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                    <div>
                                                                              <span class="btn btn-rose btn-round btn-file">
                                                                                  <span class="fileinput-new">Select image</span>
                                                                                  <span class="fileinput-exists">Change</span>
                                                                                  <input type="file" name="image" value=""/>
                                                                              </span>
                                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="email_address">slug</label>
                                                            <input type="email" class="form-control" id="email_address" name="slug" placeholder="category id" value="{{$post->slug}}">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="email_address">body</label>
                                                            <textarea style="border: 1px solid red !important;"  id="mytextarea" cols="10" rows="5" placeholder="body" class="form-control" name="body">
                                                              {{$post->body}}
                                                            </textarea>
                                                        </div>

                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            @endforeach
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

