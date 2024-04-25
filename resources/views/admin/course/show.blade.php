@extends('admin.master')

@section('title')
Show Courses | {{$course->name}}
@stop


@section('css')

@stop


@section('content') 
<div class="card-body">
        @if(session('error_catch'))
        <div class="bg-danger">{{session('error_catch')}}</div>
        @endif
        <form action="#" >

        <div class="row my-2">
                <div class="col">
                    <label for="domain_id">Domain</label>
                    <input type="text" readonly class="form-control" value="{{$course->domain->name}}">
                </div>
                <div class="col">
                    <label for="prof_id">Professor</label>
                    <input type="text" readonly class="form-control" value="{{$course->prof->name}}">
                </div>
        </div>
            <div class="row my-2">
                <div class="col">
                    <label for="name">Name</label>
                    <div class="input-group mb-3">
                        <input readonly type="text" class="form-control" name="name" value="{{$course->name}}">
                    </div>

                </div>
                <div class="col">
                    <label for="slug">Slug</label>
                    <div class="input-group mb-3 col">
                        <input readonly type="text" class="form-control" name="slug" value="{{$course->slug}}">
                    </div>

                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="language">Language</label>
                    <div class="input-group mb-3">
                        <input readonly type="text" class="form-control" name="language" value="{{$course->language}}">
                    </div>
                </div>
                <div class="col">
                    <div class="row my-2">
                        <label for="image">Image</label>
                        <div class="col">
                            <img src="{{Storage::url($course->image)}}" alt="" class="img-thumbnail" style="max-width:100px;">
                        </div>

                    </div>

                </div>

            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="description">Description</label>
                    <div class="input-group mb-3">
                        <textarea readonly name="description" rows="3" cols="3"
                                  class="form-control ">{{$course->description}}</textarea>
                    </div>

                </div>
                <div class="col">
                    <label for="short_description">Short Description</label>
                    <div class="input-group mb-3">
                        <textarea readonly name="short_description" rows="3" cols="3"
                                  class="form-control">{{$course->short_description}}</textarea>
                    </div>

                </div>
            </div>


            <div class="row my-2">
                <div class="col">
                    <label for="status">Certified</label>
                    <div class="input-group mb-3">
                        @if($course->certified == 1)
                            <span class="badge badge-success">Certified</span>
                        @else
                            <span class="badge badge-danger">Not Certified</span>
                        @endif
                    </div>

                </div>
                <div class="col">
                    <label for="trend">Trend</label>
                    <div class="input-group mb-3 col">
                        @if($course->trend == 1)
                            <span class="badge badge-success">Trending</span>
                        @else
                            <span class="badge badge-danger">Not Trending</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="price">Price</label>
                    <div class="input-group mb-3">
                        <input readonly type="number" name="price"
                               class="form-control " value="{{$course->price}}">
                    </div>

                </div>
                <div class="col">
                    <label for="selling_price">Selling price</label>
                    <div class="input-group mb-3">
                        <input readonly type="number" name="selling_price"
                               class="form-control " value="{{$course->selling_price}}">
                    </div>

                </div>
            </div>

        

            <div class="row my-2">
                <div class="col">
                    <label for="duration">Duration</label>
                    <div class="input-group mb-3">
                        <input readonly type="number" name="duration"
                               class="form-control " value="{{$course->duration}}">
                    </div>

                </div>

                <div class="col">
                    <label for="map_keywords">map_keywords</label>
                    <div class="input-group mb-3">
                    <textarea readonly name="map_keywords" rows="3" cols="3"
                              class="form-control ">{{$course->map_keywords}}</textarea>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection

@section('title_page') 
Show Course | {{$course->name}}
@endsection




@section('js')

@endsection