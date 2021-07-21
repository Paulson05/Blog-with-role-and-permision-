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
