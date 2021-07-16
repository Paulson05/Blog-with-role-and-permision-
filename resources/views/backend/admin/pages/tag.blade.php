@extends('backend.admin.templetes.defaults')
@section('title', '| tags')
@section('content')

    <div class="container">
        @include('backend.admin.templetes.partials.headerpanel')
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Tags</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">+</a>
                            </div>
                            <div class="modal" id="myModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Creat tag</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Add Modal body -->
                                        <div class="modal-body">
                                            <form action="{{route('tag.store')}}" method="post" enctype= "multipart/form-data" >
                                                @csrf

                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>name</strong>
                                                            <input type="text" name="name" class="form-control" placeholder="name">

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
                                    ID
                                </th>
                                <th>
                                    name
                                </th>


                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                <tr>
                                    <td>
                                      {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{$tag->name}}
                                    </td>


                                    <td>

                                        <button type="button" class="btn btn-primary btn-sm fa fa-edit" data-toggle="modal" data-target="#example2Modal">

                                        </button>

                                        <form style="display: inline-block" method="post" action="{{route('tag.destroy', ['tag'=> $tag->id])}}" >
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
                    <div class="card-footer w-75 py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <!--  Edit Modal -->
                            <div class="modal fade pt-5" id="example2Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                                <div class="modal-dialog mt-2">
                                    <div class="modal-content mt-5">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mt-5">
                                            <form>
                                                <div class="row">

                                                    <div class="col-md-12 mb-3">
                                                        <label for="email_address">name</label>
                                                        <input type="email" class="form-control" id="email_address" name="name" placeholder="tag name" value="">
                                                    </div>



                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

