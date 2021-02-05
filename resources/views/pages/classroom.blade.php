@extends('layouts.master')

@section('content')


    <nav class="navbar navbar-default ">
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

                    @if($joined_class_rooms->count()==1)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">Requests (<b>{{$class_request->count()}}</b>)</a>
                            <ul class="dropdown-menu notify-drop">
                                <div class="text-center notify-drop-title ">
                                    <h4> Join Requests</h4>
                                </div>
                                <!-- end notify title -->
                                <!-- notify content -->
                                <div class=" mt-5 drop-content notification-dropdown-1">
                                    @foreach($class_request as $request)
                                        <li>
                                            <div class="border border-primary">
                                                <b>{{$request->name}}</b> <br>
                                                <b>{{$request->email}}</b>
                                                <span class="pull-right ">

                                                <a href="{{route('classroom.request', $request->pivoit_id)}}"
                                                   style="margin-right: 5px"> <i class="fal fa-check fa-2x"></i></a>

                                            <a href="{{route('classroom.delete', $request->pivoit_id)}}"><i
                                                        class="fal fa-times fa-2x"></i></a>
                                            </span>

                                            </div>
                                            <hr>
                                        </li>
                                    @endforeach
                                </div>

                            </ul>
                        </li>

                    @endif

                    {{--       <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                  aria-expanded="false"><i class="fal fa-plus"></i></a>
                               <ul class="dropdown-menu">
                                   <li><a href="#" data-toggle="modal" data-target="#create-class-modal">Create Class</a></li>
                                   <li><a href="#" data-toggle="modal" data-target="#join-class-modal">Join Class</a></li>
                               </ul>
                           </li>--}}
                    {{--    <li><a href="#">To Do</a></li>--}}
                    <li><a href="#"> {{ Auth::user()->name }}</a></li>
                    {{--  <li><a href="#">Calendar</a></li>--}}
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                           class="navbar-sign-out-btn">Sign Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid --><!-- /.container-fluid -->
    </nav>





    <div class="container navbar-margin">
        <div class="row">

            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1>{{$classroom[0]->name}}</h1>
                    <p>{{$classroom[0]->subject}}</p>
                    <p>Section {{$classroom[0]->section}}</p>
                    <p>Room {{$classroom[0]->room}}</p>
                    <div class="class-id-share-div">
                        <p id="post-shortlink"><strong>{{$classroom[0]->slug}}</strong> <span
                                    class="btn btn-warning btn-sm" id="copy-button"
                                    data-clipboard-target="#post-shortlink">Copy</span></p>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <header><h3>What do you have to say?</h3></header>
                <form method="post" action="{{ route('post.store') }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5"
                                  placeholder="Your Post" required></textarea>
                    </div>
                    <input type="hidden" name="class_room_id" value="{{$classroom[0]->id}}">

                    <button type="submit" class="btn btn-primary">Create Post</button>

                </form>
                <header><h3>What other people say...</h3></header>
                @foreach($posts as $post)
                    <div class="post-box">


                        <article class="post" data-postid="">
                            <h3>{{ $post->body }}</h3>
                            <div class="info">
                                Posted by <b>{{$post->user->name}} </b> on
                                <b>{{$post->created_at->format('l j, F Y \a\t h:i:s A')}}</b>
                            </div>
                            <div class="interaction">



                            </div>
                        </article>

                        <hr/>
                        <h4>Comments</h4>
                        @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
                        <hr/>
                        <h4>Add comment</h4>
                        <form method="post" action="{{ route('comment.add')      }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="comment_body" class="form-control" required/>
                                <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add Comment"/>
                            </div>
                        </form>
                        <br>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Download file</th>
                                <th>For</th>
                            </tr>
                            @forelse ($files as $file)
                                <tr>
                                    <td>{{ $file->title }}</td>
                                    <td><a href="{{ route('file.download', $file->uuid) }}">{{ $file->cover }}</a></td>
                                    <td>{{ $file->type }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No flies found.</td>
                                </tr>
                            @endforelse
                        </table>

                    </div>
                    <div class="card">
                        <div class="card-header">Add new File</div>

                        <div class="card-body">

                            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <br>
                                <input type="text" name="title" class="form-control" placeholder="Title" required>

                                <br>
                                For:
                                <br>
                                <select   name="type">
                                    <option value="mid1"> Mid 1</option>
                                    <option value="mid2"> Mid 2</option>
                                    <option value="final"> Final</option>

                                </select>

                                <br> <br>

                                Cover File:
                                <br>
                                <input type="file" name="cover" class="" required>

                                <br><br>
                                <input type="hidden" name="group_id" value="{{$classroom[0]->id}}">
                                <input type="submit" value=" Upload File " class="btn btn-primary" >

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 200px"></div>
@endsection
