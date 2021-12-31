@extends('layouts.app')

@section('content')
<div class="container" style="border: none">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div>
                @foreach($user->images as $image)

                <div>

                    <div class="card-header" style= "border-radius: 35px; margin-top: 20px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px">
                        <div style="padding-left: 35px; padding-top: 20px">{{$image->title}}</div>
                        <br>
                        <div style="display: flex; padding-top: 0px; padding-left:35px">
                            <div>
                                <img src="{{ asset('/storage/images/'.$image->image_path)}}" style="width: 350px; height:250px; border-radius: 15px">
                            </div>
                            <div style="padding-left: 35px; padding-right: 35px; line-height:30px">

                                <div>Category: {{$image->category}}</div>
                                <br>
                                <div>Description: {{$image->description}}</div>
                                <br>
                                <div>Location: {{$image->location}}</div>
                                <br>
                                <div>Price: {{$image->price}}</div>

                            </div>
                        </div>
                        <div style="padding-left: 35px; padding-top: 20px; display:flex; justify-content:space-between; padding-right:35px">

                            <a href="{{ route('image.edit', ['id' => $image->id]) }}" class="btn btn-success">Update</a>
                            <a href="{{ route('image.destroy', ['id' => $image->id]) }}" class="btn btn-secondary">Delete</a>
                            
                            <div>
                                {{$image->created_at}}
                            </div>

                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection