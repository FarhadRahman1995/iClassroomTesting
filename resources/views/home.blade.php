
@extends('layouts.master')


@section('content')

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/classroom">iClassroom</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><i class="fal fa-plus"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#create-class-modal">Create Class</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#join-class-modal">Join Class</a></li>
                        </ul>
                    </li>
                   {{-- <li><a href="#">To Do</a></li>--}}
                    <li><a href="/classroom"> {{ Auth::user()->name }}</a></li>
                   {{-- <li><a href="#">Calendar</a></li>--}}
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                           class="navbar-sign-out-btn">Sign Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <div class="container navbar-margin">
        <div class="row">
            <h3 class="col-md-12">Created Rooms</h3>
            @foreach($classrooms as $classroom)
                <div class="col-lg-4 col-md-4 col-sm-6 ">
                    <a href="{{route('classroom.index', ['slug' => $classroom->slug])}}" class="class-panel">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4><strong>   {{$classroom->name}}</strong></h4>
                                <p>Section {{$classroom->section}}</p>

                            </div>
                        </div>
                    </a>
                </div>

            @endforeach




        </div>
        <div class="row">
            <h3  class="col-md-12">Joined Rooms</h3>
            <div class="list-group">


                @foreach($joined_class_rooms as $joined_class_room)
                    <div class="col-lg-4 col-md-4 col-sm-6 ">
                        <a href="{{route('classroom.index', ['slug' => $joined_class_room->slug])}}" class="class-panel">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4><strong>  {{$joined_class_room->name}}</strong></h4>
                                    <p>Section {{$joined_class_room->section}}</p>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>






        <!--MODALS MODALS-->
        <!--MODALS MODALS-->
        <!-- Large modal -->
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="create-class-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create Class</h4>
                    </div>
                    <div class="modal-body">
                        <form  class="create-class-form" id="modal" action="{{route('classroom.store')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputClassName">Class Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputClassName"
                                        placeholder="Class Name" required>
                            </div>
                               <div class="form-group">
                                      <label for="exampleInputSection">Section</label>
                                      <input name="section"  type="text" class="form-control" id="exampleInputSection"
                                             placeholder="Section">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputSubject">Subject</label>
                                      <input name="subject"  type="text" class="form-control" id="exampleInputSubject"
                                             placeholder="Subject">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputRoom">Room</label>
                                      <input name="room"  type="text" class="form-control" id="exampleInputRoom"
                                             placeholder="Room">
                                  </div>

                            <button type="submit" class="btn btn-info">Create Class</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="join-class-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Join Class</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('classroom.add')}}" method="POST" class="create-class-form">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputClassRoom">Class ID</label>
                                <input name="classroom" type="text" class="form-control" id="exampleInputClassRoom" placeholder="Class ID (For Example: E453TUX)" required>
                            </div>

                            <button type="submit" class="btn btn-info">Join Class</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--MODALS MODALS-->
        <!--MODALS MODALS-->
    </div>



@endsection