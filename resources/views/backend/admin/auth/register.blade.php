@extends('backend.admin.auth.defaults')
@section('auth', 'register')
@section('content')
    <style>
        #background_image{
            background-image: url(../../assets/img/bg14.jpg) !important;
        }
    </style>
    <div id="background_image" class="full-page login-page section-image" filter-color="black" data-image="" style="background-image: url(../../assets/img/bg14.jpg) !important;">

        <div class="content">
            <div class="container">
                <div class="col-md-4 ml-auto mr-auto">
                    <form class="form" method="post" action="{{route('admin.postregister')}}">
                           @csrf
                        <div class="card card-login card-plain">

                            <div class="card-header ">
                                <div class="logo-container">
                                    <img src="{{asset('assets/img/now-logo.png')}}" alt="">
                                </div>
                            </div>
                            <h2 class="text-center">Register</h2>


                            <div class="card-body ">

                                <div class="input-group no-border form-control-lg">
                                <span class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="now-ui-icons users_circle-08"></i>
                                  </div>
                                </span>
                                    <input type="text" name="name" class="form-control" placeholder="User Name...">
                                </div>

                                <div class="input-group no-border form-control-lg">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons text_caps-small"></i>
                                        </div>
                                    </div>
                                    <input type="email" name="email" placeholder="email" class="form-control">
                                </div>
                                <div class="input-group no-border form-control-lg">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons text_caps-small"></i>
                                        </div>
                                    </div>
                                    <input type="password"  name="password" placeholder="passwowrd..." class="form-control">
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12 ">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>




                        </div>

                    </form>

                </div>
            </div>
        </div>
        @include('backend.admin.auth.partials.footer')

    </div>
@endsection
