<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use App\File;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //

        $classroom = ClassRoom::where('user_id', auth()->user()->id)->get();
    //    $joined_class_roomse = User::find(auth()->user()->id)->classrooms->where('status','=','no');
        $joined_class_rooms = DB::table('class_room_user')
            ->where('class_room_user.user_id', '=',auth()->user()->id )
            ->where('status','=','yes')
            ->join('class_rooms', 'class_room_user.class_room_id', '=', 'class_rooms.id')

            ->get();

        return view('home')->with(['classrooms'=> $classroom,
            'joined_class_rooms'=>$joined_class_rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request);
        $classRoom = ClassRoom::create([
            'name' => $request->input('name'),
            'section' => $request->input('section'),
            'subject' => $request->input('subject'),
            'room' => $request->input('room'),
            'slug' => Str::random(15)  ,
            'user_id' => auth()->user()->id

        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classroom = ClassRoom::where('slug', $id)->get();

        $joined_class_rooms =  DB::table('class_rooms')
            ->where('user_id', '=', auth()->user()->id)
            ->where('slug', '=',$id)->get();;


        $class_request = DB::table('class_room_user')
                                            ->where('class_room_id', '=',$classroom[0]->id )
                                            ->where('status','=','no')

                          ->join('users', 'class_room_user.user_id', '=', 'users.id')
            ->select('name','pivoit_id','email')

            ->get();

        $post = Post::where('class_room_id',$classroom[0]->id)->orderBy('created_at', 'desc')->get();

        $file = File::where('group_id', $classroom[0]->id)->orderBy('created_at', 'desc')->get();
        return view('pages.classroom', ['classroom'=>$classroom,'posts'=>$post,'class_request'=>$class_request,'files'=>$file,
            'joined_class_rooms'=>$joined_class_rooms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function addToClassRoom(Request $request)
    {
        $classroom_slug = $request->input('classroom');
        $classroom = ClassRoom::where('slug', $classroom_slug )->get();

        Auth::user()->addToClassRoom($classroom[0]->id);
        return back();
    }

    public function requestToClassRoom($id)
    {

       $db= DB::table('class_room_user')
            ->where('pivoit_id', $id)
            ->update(['status' => 'yes']);


        return back();
    }
    public function deleteToClassRoom($id)
    {

        $db= DB::table('class_room_user')
            ->where('pivoit_id', $id)
            ->delete();


        return back();
    }
}
