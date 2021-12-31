@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="{{ route('image.index')}}" style="padding-left: 45px;border-bottom: none; border-radius: 35px;
                margin-top: 20px; box-shadow: 3px 3px green, -1em 0 .4em green; display: flex">
                <div>
                    <input type="text" id="search" name= "search" class="form-control" style="margin-right: 400px; border-radius: 35px">
                </div>
                <div>
                    <input type="submit" value="Search" class="btn btn-light" style="margin-bottom: 5px">
                </div>

            </form>

            <div>
                @foreach($images as $images)

                <div>

                    <div class="card-header" style="border-radius: 35px; margin-top: 20px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <div style="padding-left: 35px; padding-top: 20px; ">{{$images->title}}</div>
                        <br>
                        <div style="display: flex; padding-top: 0px; padding-left:35px">
                            <div>
                                <img src="{{ asset('/storage/images/'.$images->image_path)}}" style="width: 350px; height:250px; border-radius: 15px">

                            </div>
                            <div style="padding-left: 35px; padding-right: 35px; line-height:30px">


                                <div>Category: {{$images->category}}</div>
                                <br>
                                <div>Description: {{$images->description}}</div>
                                <br>
                                <div>Location: {{$images->location}}</div>
                                <br>
                                <div>Price: {{$images->price}}</div>

                            </div>
                        </div>
                        <div style="padding-left: 35px; padding-top: 20px; display:flex; justify-content:space-between; padding-right:35px">

                            <a href="" class="btn btn-success">BUY NOW</a>
                            <div>
                                {{$images->created_at}}
                            </div>

                        </div>

                    </div>
                    @endforeach

                    
                </div>
            </div>

        </div>
    </div>
    @endsection