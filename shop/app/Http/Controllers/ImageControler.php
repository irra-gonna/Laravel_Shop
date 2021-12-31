<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use illuminate\validation\validator;

class ImageControler extends Controller
{
    //only for logged users
    public function __construct()
    {
        $this->middleware('auth');
    }
    //also create a views_folder (file = crete.blade.php)
    public function create()
    {
        return view('image.create');
    }

    public function search($search = null){
        if(!empty($search)){
            $images = Image::where('title', 'LIKE', '%'.$search.'%')
                            ->orWhere('category', 'LIKE', '%'.$search.'%')
                            ->orWhere('description', 'LIKE', '%'.$search.'%')
                            ->orWhere('location', 'LIKE', '%'.$search.'%')
                            ->orWhere('description', 'LIKE', '%'.$search.'%')
                            ->orWhere('price', 'LIKE', '%'.$search.'%')
                            ->orderBy('id','desc')
                            ->paginate(5);
        
        }else{
            $images = Image::orderBy('id', 'desc')->paginate(5);
        }

        return view('image.index',[
            'images' => $images
    ]);
        
    }


    public function store(Request $request)
    {
        //validacion de datos
        $request->validate([
            'image_path' => 'required',
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'location' => 'required',
            'price' => 'required',

        ]);
        
        // //asignar valores a objeto
        // $request->file('image_path')->store('public/images/');
        
        $user = \Auth::user();
        $image = new Image();
        $image->user_id = $user->id;
        $image->image_path = null;
        $image->title = $request->title;
        $image->category = $request->category;
        $image->description = $request->description;
        $image->location = $request->location;
        $image->price = $request->price;
        

        if ($request->hasfile('image_path')){
            $destination_path = 'public/images';
            $image_path = $request->file('image_path');
            $image_path_name = $image_path->getClientOriginalName();
            $path = $request->file('image_path')->storeAs($destination_path, $image_path_name);
            $image->image_path = $image_path_name;
        }

        $image->save();

         return redirect()->route('home')->with(['message' => 'Successfully uploaded!']);


    }
    public function index()
    {
        $image = Image::orderBy('id', 'desc')->get();

        return view('home',[
            'images' => $image
    ]);
    }
    
    public function destroy(Image $image,$id) {
        $image = Image::find($id);
        $image->delete();

        return redirect()-> route('home')->with("success", "Image deleted successfully.");
    }
    public function edit($id){
        $user = \Auth::user();
        $image = Image::find($id);
        $id = $image->id;
        
        if($user && $image && $image->user_id == $user->id){
            return view('image.edit', [
              'image' => $image  
            ]);
        }else{
            
            return redirect()->route('home');
        }

    }

    public function update(Request $request){

        $validate = $this->validate($request,[
            'image_path' => 'nullable',
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'location' => 'required',
            'price' => 'required',

        ]);
            

        $image_id = $request->input('image_id');
        $image_path = $request->file('image_path');
        $title = $request->input('title');
        $category = $request->input('category');
        $description = $request->input('description');
        $location = $request->input('location');
        $price = $request->input('price');

        $image = Image::find($image_id);
        $image->title = $title;
        $image->category = $category;
        $image->description = $description;
        $image->location = $location;
        $image->price = $price;

        if ($request->hasfile('image_path')){
            $destination_path = 'public/images';
            $image_path = $request->file('image_path');
            $image_path_name = $image_path->getClientOriginalName();
            $path = $request->file('image_path')->storeAs($destination_path, $image_path_name);
            $image->image_path = $image_path_name;
            }

            
        $image->update();
        return redirect()->route('home', ['id' => $image_id]);
    }

    
    

} 
    