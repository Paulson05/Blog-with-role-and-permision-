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
                                <h4 class="card-title"> ALL Post</h4>
                            </div>
                            <div class="col-4 text-right">

                                <button type="button" class="btn btn-primary btn-sm fa fa-plus-square-o" data-toggle="modal" data-target="#exampleModal">

                                </button>
                            </div>
                                               {{--add model--}}
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
                                           <ul id="saveform_errList"></ul>
                                            <div id="success_message"></div>



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

                            {{--edit modal --}}
                            <div  class="modal  fade pt-5" id="example3Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Post</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="box-body">
                                            <ul id="updateform_errList"></ul>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <input type="hidden" id="edit_post_id">
                                                @php
                                                    $post = \App\Models\Post::all();
                                                @endphp
                                                <div class="form-group">
                                                    <strong>Title</strong>
                                                    <input type="text" name="title" class="form-control"  placeholder="title" id="edit_title" value="">

                                                </div>

                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Slug</strong>
                                                    <input type="text" name="slug" class="form-control" placeholder="slug" id="edit_slug" value="">

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
                                                                <option  value="" id="edit_category_id"></option>
                                                                <option {{($category->name === 'name')  ? 'selected' : ''}}  value="{{$category->id}}" id="edit_category_id">{{$category->name}} </option>

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
                                                                    <option {{($tag->name === 'name')  ? 'selected' : ''}} name="name[]" value="{{$tag->id}}" id="edit_name">{{$tag->name}} </option>
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
                                                                <img src="/upload/images/" alt="..." id="image">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                            <div>
                                                                              <span class="btn btn-rose btn-round btn-file">
                                                                                  <span class="fileinput-new">Select image</span>
                                                                                  <span class="fileinput-exists">Change</span>
                                                                                  <input type="file" name="image" id="image"  />
                                                                              </span>
                                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>body</strong>
                                                        <textarea id="edit_body" style="border: 1px solid red !important;"  id="body" cols="10" rows="5" placeholder="body" class="form-control" name="body" value = "">
                                                        </textarea>

                                                    </div>

                                                </div>




                                            </div>



                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="add_post btn-default pull-left " data-dismiss="modal">close</button>
                                            <button type="submit" class="update_post btn btn-primary ">Update</button>

                                        </div>



                                    </div>




                                </div>

                            </div>




                            {{--delete model--}}


                            <div  class="modal  fade pt-5" id="example2Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Post</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                       <input type="hidden" id="delete_post_id">

                                               <h4>are you sure want to delete this data</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="add_post btn btn-outline-secondary" data-dismiss="modal">close</button>
                                            <button type="submit" class="delete_post_btn btn btn-primary delete_post_btn">yes delete</button>

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

                                    <td><button type="button"  class="edit_post btn btn-primary" ><i class="fa fa-edit"></i></button></td>
                                    <td><button type="button" class="delete_post btn btn-danger" ><i class="fa fa-trash"></i></button></td>
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
                            fetchpost();
                          function fetchpost() {
                              $.ajax({
                                  type: "GET",
                                  url:"{{route('post.fetch')}}",
                                  dataType:"json",
                                  success: function (response) {
                                      // console.log(response.posts);

                                      $('tbody').html("");
                                      $.each(response.posts, function (key, item){
                                          $('tbody').append('<tr>\
                                            <td>'+item.id+'</td>\
                                           <td>'+item.title+'</td>\
                                           <td>'+item.slug+'</td>\
                                           <td>'+item.image+'</td>\
                                           <td>'+item.category_id+'</td>\
                                            <td><button type="button"  value="'+item.id+'" class="edit_post btn btn-primary" ><i class="fa fa-edit"></i></button></td>\
                                              <td><button type="button" value="'+item.id+'"  class="delete_post btn btn-danger" ><i class="fa fa-trash"></i></button></td>\
                                            </tr>');
                                      });
                                  }
                              })
                          }

                        {{--delete--}}
                        $(document).on('click', '.delete_post', function (e){
                             e.preventDefault();

                             var post_id  = $(this).val();
                             // alert(post_id);

                            $('#delete_post_id').val(post_id);

                            $('#example2Modal').modal("show");

                    });
                        $(document).on('click', '.delete_post_btn', function (e){
                            e.preventDefault();


                            var post_id  = $('#delete_post_id').val();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: "DELETE",
                                url:"/post/"+post_id,
                                success: function (response){
                                    // console.log(response);
                                    $('#success_message').addClass("alert  alert_success");
                                    $('#success_message').text("response.message");
                                    $('#example2Modal').modal("hide");
                                    $('.delete_post_btn').text("yes Delete");
                                    fetchpost();
                                }

                            });

                        });

                        {{--edit--}}
                        $(document).on('click', '.edit_post', function (e){
                            e.preventDefault();
                            let post_id  = $(this).val();
                            // console.log(post_id);
                            $('#example3Modal').modal("show");
                            $.ajax({
                                type: "GET",
                                url:"/edit-post/"+post_id,

                                success: function (response) {
                                    console.log(response);
                                    if (response.status == 404){
                                        $('#success_message').html("");
                                        $('#success_message').addClass('alert alert-danger');
                                        $('#success_message').text(response.message);

                                    }
                                    else{
                                        $("#edit_title").val(response.post.title);
                                        $("#edit_slug").val(response.post.slug);
                                        $("#edit_category_id").val(response.post.category_id);
                                        $("#edit_name").val(response.post.name);
                                        $("#edit_body").val(response.post.body);
                                        $("#image").val(response.post.image);
                                        $("#edit_post_id").val(post_id);
                                    }

                                }
                            });


                        });
                        {{--update--}}
                        $(document).on('click', '.update_post', function (e){
                            e.preventDefault();

                            let post_id  = $('#edit_post_id').val();
                            var data = {
                                'title' : $('#edit_title').val(),
                                'slug' : $('#edit_slug').val(),
                                'tag' : $('#edit_tag').val(),
                                'image' : $('#image').val(),
                                'category_id' : $('#edit_category_id').val(),
                                'body' : $('#edit_body').val(),

                            }
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: "PUT",
                                url:"/update-post/"+post_id,
                                data:data,
                                dataType:"json",
                                datType: "image/jpeg",

                                success: function (response){
                                    // console.log(response);
                                    if (response.status == 400)
                                    {
                                        $('#updateform_errList').html("");
                                        $('#updateform_errList').addClass("alert  alert-danger");
                                        $.each(response.errors, function (key, err_value) {
                                            $('#updateform_errList').append('<li>'+err_value+'</li>');
                                        })
                                    }
                                    else{
                                        $('#updateform_errList').html("");
                                        $('#success_message').addClass("alert  alert-success");
                                        $('#success_message').text("response.message");
                                        $('#example3Modal').modal("hide");
                                        fetchpost();
                                    }

                                }
                            });

                        });


                               {{--add post--}}


                        $(document).on('click', '.add_post', function (e){
                            e.preventDefault();
                            // console.log('click');
                            var data = {
                                'title' : $('.title').val(),
                                'body' : $('textarea#mytextarea').val(),
                                'name' : $('.name').val(),
                                'slug' : $('.slug').val(),
                                'image' : $('.image').attr("src", data),
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
                                url:"/post/",
                                data:data,
                                dataType:"json",
                                datType: "image/jpeg",
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
                                        $('#success_message').addClass("alert  alert-success");
                                        $('#success_message').text("response.message");
                                        $('#exampleModal').modal("hide");
                                        $('#exampleModal').find("input").val("");
                                        fetchpost();
                                    }

                                }
                            })
                        });


                    });
            </script>

@endsection
