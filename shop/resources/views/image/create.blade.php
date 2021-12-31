@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>

                <div class="card-header" style="padding-left: 45px;border-bottom: none; 
                border-radius: 35px; box-shadow: 3px 3px green, -1em 0 .4em green;">NEW PRODUCT</div>

                <div class="card-body" style="margin-top: 20px;border-radius: 35px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                    <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group-row">
                            <label for="image_path" style="padding-left: 27px;" class="col-md-4 col-form-label">Image</label>
                            <div class="col-md-5">
                                <input style="border: none;" id="image_path" type="file" name="image_path" class="form-control" required />
                                @if($errors->has('image_path'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->firts('image_path') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label for="title" style="padding-left: 27px;" class="col-md-4 col-form-label">Title</label>
                            <div class="col-md-7">
                                <textarea id="title" name="title" class="form-control" required></textarea>
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
                                <select name="category" id="category" class="form-control" style="padding-left: 8px; width: 9.9cm" required>
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
                                <textarea id="description" name="description" class="form-control" required></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label for="location" style="padding-left: 27px;" class="col-md-4 col-form-label">Location</label>
                            <div class="col-md-7">
                                <textarea id="location" name="location" class="form-control" required></textarea>
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
                                <textarea type='number' id="price" name="price" class="form-control" required></textarea>
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
                                <input type="submit" class="btn btn-success" value="Upload">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection