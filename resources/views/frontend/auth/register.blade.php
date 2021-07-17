@extends('frontend.auth.defaults')
@section('auth', 'register')

@section('content')
    <style>
        #background_image{
            background-image: url(../../assets/img/bg14.jpg) !important;
        }
    </style>
    <div class="wrapper wrapper-full-page ">

        <div id="background_image" class="full-page login-page section-image" filter-color="black" data-image="" style="background-image: url(../../assets/img/bg14.jpg) !important;">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="col-md-4 ml-auto mr-auto">
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


                        <form class="form" method="post" action="{{route('user.postregister')}}">
                            @csrf
                            <div class="card card-login card-plain">
                                <h2 class="text-center">Register</h2>

                                <div class="card-body ml-5 ">
                                    <div class="col-md-12 ml-3">
                                     <div class="ml-3 container">
                                         <div class="fileinput fileinput-new text-center ml-3" data-provides="fileinput">
                                             <div class="fileinput-new thumbnail img-circle text-center">
                                                 <img src="../../assets/img/placeholder.jpg" alt="...">
                                             </div>
                                             <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                             <div>
                                                  <span class="btn btn-round btn-rose btn-file">
                                                      <span class="fileinput-new">Add Photo</span>
                                                      <span class="fileinput-exists">Change</span>
                                                      <input type="file" name="image" /></span>
                                                 <br />
                                                 <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                             </div>
                                         </div>
                                     </div>
                                    </div>

                                    <div class="input-group no-border form-control-lg">
                                <span class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="now-ui-icons users_circle-08"></i>
                                  </div>
                                </span>
                                        <input type="text" name="name" class="form-control" placeholder="name">
                                    </div>

                                    <div class="input-group no-border form-control-lg">
                                <span class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="now-ui-icons users_circle-08"></i>
                                  </div>
                                </span>
                                        <input type="text" name="email" class="form-control" placeholder="email">
                                    </div>

                                    <div class="input-group no-border form-control-lg">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons text_caps-small"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="password" placeholder="Password..." class="form-control">
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                                        <button type="submit" class="btn btn-primary text-center">Register</button>
                                    </div>
                                </div>




                            </div>



                        </form>
                    </div>
                </div>
            </div>
            @include('frontend.auth.partials.footer')


        </div>


    </div>
@endsection
