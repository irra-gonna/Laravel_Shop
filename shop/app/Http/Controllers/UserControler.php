<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Image;

class UserControler extends Controller
{
    //only registred users could have access
    public function __construct()
    {
        $this->middleware('auth');
    }
    //update user-data
    public function config()
    {
        return view('user.config');
    }

    public function update(Request $request)
    {
        $user = \Auth::user();
        $id = $user->id;

        $validate = $this->validate($request, [
            'nickname' => ['required', 'string', 'max:255', 'unique:users,nickname,' . $id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'phone_number' => ['required', 'numeric', 'min:9', 'unique:users,phone_number,' . $id],
        ]);

        $nickname = $request->input('nickname');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');

        $user->nickname = $nickname;
        $user->email = $email;
        $user->phone_number = $phone_number;

        // $image_path = $request->file('image_path');
        // if ($image_path) {
        //     //poner nombre unico s

        //     $image_path_name = time().$image_path->getClientOriginalName();

        //     //save in the users folder storage/app/users

        //     Storage::disk('users')->put($image_path_name, File::get($image_path));

        //     //set the name in the object
        //     $user->image = $image_path_name;
        // }


        $user->update();

        return redirect()->route('config')->with(['message' => 'Successfully Updated!']);
    }

    // public function getImage($filename){
    //     $file = Storage::disk('users')->get($filename);
    //     return new Response($file,200);
    //}

     
    public function profile($id){
        $user = User::find($id);

        return view('user.profile', [
                'user' => $user
        ]);
        
    }

    
}