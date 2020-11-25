<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;

use Intervention\Image\ImageManagerStatic as Image;
use Str;
use Auth;
use App\Models\User;
use App\Models\Photo;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('editprofile');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('editprofile',['user'=>User::find($id)]);
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
        $img = Image::make($request->file("logo"));
        $fileName = Str::random(5).'.jpg';
        $folder = public_path('img');
        $img->resize(100,null,function ($constraint){
                $constraint->aspectRatio();
        });
        $img->save($folder.'/'.$fileName,100, 'jpg');
        $user = Auth::User();
            if(!$user->logo=="" || $user->logo!=null){
                unlink(public_path('img\\'.$user->logo));
            }
        $user->logo = $fileName;
        $user->update();
        return redirect()->route('task.index');
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
    public function storePhoto(Request $request)
    {
      if ($request->has('photos')) {
        $folder = public_path('img');
        $user = Auth::User();
      foreach ($request->file('photos') as $photo) {
        $img = Image::make($photo);
        $fileName = Str::random(5).'.jpg';
        $img->resize(270,null,function ($constraint){
              $constraint->aspectRatio();
        });
        $img->save($folder.'/'.$fileName,100, 'jpg');

        $photo = new Photo();
        $photo->photo = $fileName;
        $photo->user_id =$user->id;
        $photo->save();
      }
      }
      return redirect()->route('task.index');
    }

    public function deletePhoto( $id)
    {
        $photo = Photo::find($id);
        if(!$photo->photo=="" || $photo->photo!=null){
            unlink(public_path('img\\'.$photo->photo));
        }
        $photo->delete();
        return redirect()->route('task.index');
    }
}
