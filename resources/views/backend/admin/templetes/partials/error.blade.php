<div class="col-md-12">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<script>
    $(document).ready(function () {

        $(document).on('click', '.add_post', function (e){
            e.preventDefault();
            console.log("ok");
            var data = {
                'name' : $('name').val(),
                'email' : $('email').val(),
                'phone' : $('phone').val(),
                'course' : $('sourse').val(),
            }
            console.log('data');
        })
        fetchstudent();
        function fetchstudent() {
            $.ajax({
                type: "GET",
                url:"/fetch-student",
                dataType:"json",
                success:function(response){
                    // console.log(response.students);

                    $('body').html("");
                    $.each(response.students, function (key, item){
                        $('tbody').append('<tr>\
                            <td>'+item.id+'<td>\
                           <td>'+item.name+'<td> \
                           <td>'+item.email+'<td>\
                           <td>'+item.phone+'<td> \
                           <td>'+item.course+'<td>\
                           <td><button type="buuton" value="'+item.id+'" class="edit_studenet btn btn-primary" ><button>edit<td>\
                            <td><button type="buuton" value="'+item.id+'" class="edit_studenet btn  btn-danger" ><button>delete<td> \
                            </tr>')
                    });
                }

            {
                $('#saveform_errList').html("");
                $('#saveform_errList').addClass("alert  alert_success");
                $.each(response.errors, function (key, err_values){
                    $('#saveform_errList').append('<li>'+err_value+'</li>');

                });

            }

        else{
                $('#saveform_errList').html("");
                $('#success_message').addClass("alert  alert_success");
                $('#success_message').text("response.message");
                $('#AddStudentModal').modal("hide");
                $('#AddStudentModal').find("input").val();


            }
        });
        }



    });
</script>


$validator = Validator::make($request->all(),[
'title' => 'required',
'body'=>  'required',
'slug' => 'required',
'image' => 'required',
'category_id' => 'required',
]);

if ($validator->fail()){
return response()->json([
'status' => 400,
'errors' => $validator->message(),
]);
}
else{
$post = new Post;
$post->name = $request->input('title');
$post->name = $request->input('body');
$post->name = $request->input('slug');
$post->name = $request->input('image');
$post->name = $request->input('category_id');
$post->save();
return response()->json([
'status' => 200,
'message' => 'post added succesfully',
]);



}


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





$.ajax({
type: "DELETE",
url:"/delete-student"+post_id,
success: function (response){
$('#success_message').addClass("alert  alert_success");
$('#success_message').text("response.message");
$('#deletepost').modal("hide");
fetchpost();
}

});
