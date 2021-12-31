@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>

                <div class="card-header" style="padding-left: 45px;border-bottom: none; border-radius: 35px;
                margin-top: 20px; box-shadow: 3px 3px green, -1em 0 .4em green;">EDIT AD</div>

                <div class="card-body" style= "box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; border-radius: 35px; margin-top: 20px">
                    <form method="POST" action="{{ route('image.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image_id" value="{{$image->id}}">

                        <div class="form-group-row">
                            <label for="image_path" style="padding-left: 27px;" class="col-md-4 col-form-label"></label>
                            <div>
                                <img src="{{ asset('/storage/images/'.$image->image_path)}}" style="width: 350px;
                                 height:250px; padding-left: 30px; width: 350px; height:250px; border-radius: 15px">

                                <div>

                                <input style="border: none; padding-left: 30px; margin-top: 10px" id="image_path" type="file" value = "{{$image->id}}" name="image_path" class="form-control"/> 

                                </div>
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label for="title" style="padding-left: 27px;" class="col-md-4 col-form-label">Title</label>
                            <div class="col-md-7">
                                <textarea id="title" name="title" class="form-control" required> {{$image->title}}</textarea>
                                @if($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->firts('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label for="category" style="padding-left: 27px;" class="col-md-4 col-form-label">Category</label>
                            
                            <div class="col-md-7" style="padding-left: 25px;">
                                    <select name="category" id="category" class="form-control" style="padding-left: 8px;" required>
                                        <option value="">All Categories</option>
                                        <option value="House">House</option>
                                        <option value="Car">Car</option>
                                        <option value="Motorbike">Motorbike</option>
                                        <option value="Furnitue">Furniture</option>
                                        <option value="Technology">Technology</option>
                                    </select>
                                @if($errors->has('category'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->firts('category') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label for="description" style="padding-left: 27px;" class="col-md-4 col-form-label">Description</label>
                            <div class="col-md-7">
                                <textarea id="description" name="description" class="form-control" required> {{$image->description}} </textarea>
                                @if($errors->has('location'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->firts('location') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label for="location" style="padding-left: 27px;" class="col-md-4 col-form-label">Location</label>
                            <div class="col-md-7">
                                <textarea id="location" name="location" class="form-control" required> {{$image->location}} </textarea>
                                @if($errors->has('location'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->firts('location') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label for="price" style="padding-left: 27px;" class="col-md-4 col-form-label">Price</label>
                            <div class="col-md-7">
                                <textarea type='number' id="price" name="price" class="form-control" required> {{$image->price}} </textarea>
                                @if($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->firts('price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group-row" style="padding-left: 10px;">
                            <div class="col-md-7">
                                <br>
                                <input type="submit" class="btn btn-success" value="Edit">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection