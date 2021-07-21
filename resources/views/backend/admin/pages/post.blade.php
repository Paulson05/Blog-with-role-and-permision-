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
                                        <div id="success_message"></div>
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Creat Post</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                           <ul id="saveform_errList"></ul>



                                                <div class="row">

                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Title</strong>
                                                            <input type="text" name="title" class="title form-control" placeholder="email" value="{{old('title')}}">

                                                        </div>

                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Slug</strong>
                                                            <input type="text" name="slug" class="slug form-control" placeholder="slug" value="">

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
                                                                <input class="category_id form-check-input" id="category_id" type="checkbox" name="category_id" value="{{$category->id}}">
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

                                                            <div class="form-check form-check-inline" >
                                                                @foreach($tags as $tag)
                                                                <label class="form-check-label"  >
                                                                    <input class="name form-check-input" name="name[]" type="checkbox" value="{{$tag->id}}">
                                                                    <span class="name form-check-sign"></span>
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
                                                                                  <input type="file" class="image" name="image" />
                                                                              </span>
                                                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>body</strong>
                                                            <textarea style="border: 1px solid red !important;"  id="mytextarea" cols="10" rows="5" placeholder="body" class="body form-control" name="body">
                                                                 {{old('body')}}}
                                                            </textarea>

                                                        </div>

                                                    </div>




                                                    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                                        <button type="submit" class="add_post btn btn-primary">Post</button>
                                                    </div>
                                                </div>


                                        </div>


                                    </div>

                                </div>




                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="table" id="datatable" >
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


                                        <a href="{{ route('post.edit',$post->id) }}" data-toggle="modal" data-target="#myEditModal{{ $post->id }}" class=" text-info "><em class="fa fa-2x fa-edit mr-1"></em></a>
                                        <div id="myEditModal{{ $post->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" align="center"><b>Edit Post</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('backend.admin.templetes.partials.error')

                                                        <form  method="post" action="{{route('post.update', ['post' => $post->id])}}" id="editForm">
                                                          @csrf
                                                            @method('PUT')
                                                            <div class="box-body">
                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <strong>Title</strong>
                                                                        <input type="text" name="title" class="form-control" placeholder="title" id="title" value="{{$post->title}}">

                                                                    </div>

                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <strong>Slug</strong>
                                                                        <input type="text" name="slug" class="form-control" placeholder="slug" id="slug" value="{{$post->slug}}">

                                                                    </div>

                                                                </div>



                                                                <div class="col-xs-12 col-sm-12 col-md-12 border-light " >
                                                                    <div class="form-group"style="border: 1px solid red !important; height: 120px !important;" >
                                                                        <strong>Category:</strong>
                                                                        @php
                                                                            $categories = \App\Models\Category::all();
                                                                        @endphp

                                                                        <div class="form-check form-check-inline" >

                                                                                <select name="category_id" class="form-control custom-select">
                                                                                    <option>--- Select an Option ---</option>
                                                                                    @foreach($categories as $category)
                                                                                        <option @if($category->id==$post->category_id){{"selected"}}@endif value="{{$category->id}}">{{$category->name}}</option>
                                                                                    @endforeach
                                                                                </select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 border-dark" style="border: 1px solid red !important; height: 120px !important;">


                                                                        <div class="form-group ">
                                                                            <strong>Tags:</strong><br>

                                                                            <div class="form-check form-check-inline" >
                                                                                     @php
                                                                                     $tags = \App\Models\Tag::all();
                                                                                @endphp

                                                                                <select name="name" id="name" class="form-control  custom-select">
                                                                                    <option>--- Select an Option ---</option>
                                                                                    @foreach($tags as $tag)
                                                                                        <option {{($tag->name === 'name')  ? 'selected' : ''}}  value="{{$tag->id}}">{{$tag->name}}</option>
                                                                                    @endforeach
                                                                                </select>


                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="col-md-6">
                                                                            <h4 class="card-title">Regular Image</h4>
                                                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail">
                                                                                    <img src="/upload/images/{{$post->image}}" alt="...">
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                                <div>
                                                                              <span class="btn btn-rose btn-round btn-file">
                                                                                  <span class="fileinput-new">Select image</span>
                                                                                  <span class="fileinput-exists">Change</span>
                                                                                  <input type="file" name="image" id="image" />
                                                                              </span>
                                                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <strong>body</strong>
                                                                            <textarea style="border: 1px solid red !important;"  id="body" cols="10" rows="5" placeholder="body" class="form-control" name="body" value = "">
                                                                                    {{$post->body}}
                                                                              </textarea>

                                                                        </div>

                                                                    </div>




                                                                </div>



                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form style="display: inline-block" method="post" action="{{ route('post.destroy',['post' => $post->id]) }}" >
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
{{--                            @php--}}
{{--                            $data = \App\Models\Post::all();--}}
{{--                            @endphp--}}




                            <!-- /Attachment Modal -->


                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
            <script>
                    $(document).ready(function () {
                        $(document).on('click', '.add_post', function (e){
                            e.preventDefault();
                            // console.log('click');
                            var data = {
                                'title' : $('.title').val(),
                                'body' : $('textarea#mytextarea').val(),
                                'name' : $('.name').val(),
                                'slug' : $('.slug').val(),
                                'image' : $('.image').val(),
                                'category_id' : $('.category_id:checked').val(),
                            }
                            // console.log(data);
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: "POST",
                                url:"{{route('post.store')}}",
                                data:data,
                                dataType:"json",
                                success: function (response){
                                    // console.log(response);
                                    if (response.status == 400)
                                    {
                                        $('#saveform_errList').html("");
                                        $('#saveform_errList').addClass("alert  alert-danger");
                                        $.each(response.errors, function (key, err_value) {
                                            $('#saveform_errList').append('<li>'+err_value+'</li>');
                                        })
                                    }
                                    else{
                                        $('#saveform_errList').html("");
                                        $('#success_message').addClass("alert  alert_success");
                                        $('#success_message').text("response.message");
                                        $('#exampleModal').modal("hide");
                                        $('#exampleModal').find("input").val("");

                                    }

                                }
                            })
                        });


                    });
            </script>

@endsection
