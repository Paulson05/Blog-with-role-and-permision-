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


    $(document).on('click', '.edit_post', function (e){
        e.preventDefault();
        let post_id  = $(this).val();
        // console.log(post_id);
        $('#example3Modal').modal("show");
        $.ajax({
            type: "GET",
            url:"/post/"+post_id,

            success: function (response) {
                console.log(response);

            }
        });


    });



    $(document).on('click', '.update_post', function (e){
        e.preventDefault();
        var post_id = $('#edit_post_id').val();
        var data = {
            'title' : $('#edit_title').val();
            'slug' : $('#edit_slug').val();
            'tag' : $('#edit_tag').val();
            'category_id' : $('#edit_category_id').val();
            'body' : $('#edit_body').val();

        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url:"/post/{post}/",
            data:data,
            dataType:"dataType",
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

</script>
