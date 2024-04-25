@extends('admin.master')

@section('title')
Edit Courses
@stop


@section('css')

@stop


@section('content') 
<div class="card-body">
        @if(session('error_catch'))
        <div class="bg-danger">{{session('error_catch')}}</div>
        @endif
        <form action="{{route('courses.update',$course->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')    
        @csrf
            <div class="row">
                <div class="col">
                    <label for="domain_id">Domain</label>
                    <select name="domain_id" id="" class="form-control">
                        <option value="">Please Select a domain</option>
                        @foreach($domains as $domain)
                            <option value="{{$domain->id}}" {{($course->domain_id == $domain->id) ? 'selected' : ''}}> {{$domain->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="prof_id">Professor</label>
                    <select name="prof_id" id="" class="form-control">
                        <option value="">Please Select a Professor</option>
                        @foreach($profs as $prof)
                            <option value="{{$prof->id}}" {{($course->prof_id == $prof->id) ? 'selected' : ''}} >{{$prof->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="name">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$course->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="slug">Slug</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug" value="{{$course->slug}}">
                    </div>
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="language">Language</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control  @error('language') is-invalid @enderror" name="language" value="{{$course->language}}">
                    </div>
                    @error('language')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <div class="row">
                        <label for="image">Image</label>
                        <div class="col">
                            <img src="{{Storage::url($course->image)}}" alt="" class="img-thumbnail" style="max-width:100px;">
                        </div>
                        <div class="col">
                            <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <label for="description">Description</label>
                    <div class="input-group mb-3">
                        <textarea name="description" rows="3" cols="3"
                                  class="form-control @error('description') is-invalid @enderror">{{$course->description}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="short_description">Short description</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description" rows="3" cols="3"
                                  class="form-control @error('short_description') is-invalid @enderror">{{$course->short_description}}</textarea>
                    </div>
                    @error('short_description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <label for="certified">Certified</label>
                    <div class="input-group mb-3">
                        <input type="checkbox" {{($course->certified == 1 ) ? 'checked' : ''}} class="" id="certified" name="certified">
                    </div>

                </div>
                <div class="col">
                    <label for="trend">Trend</label>
                    <div class="input-group mb-3">
                        <input type="checkbox" {{($course->trend == 1 ) ? 'checked' : ''}} class="" id="trend" name="trend">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="price">Price</label>
                    <div class="input-group mb-3">
                        <input type="number" name="price"
                               class="form-control @error('price') is-invalid @enderror" value="{{$course->price}}">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="selling_price">Selling Price</label>
                    <div class="input-group mb-3">
                        <input type="number" name="selling_price"
                               class="form-control @error('selling_price') is-invalid @enderror" value="{{$course->selling_price}}">
                    </div>
                    @error('selling_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="duration">Duration</label>
                    <div class="input-group mb-3">
                        <input type="number" name="duration"
                               class="form-control @error('duration') is-invalid @enderror" value="{{$course->duration}}">
                    </div>
                    @error('duration')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="map_keywords">Map Keywords</label><span
                        class="text-danger">  (Put Comma between Technologies!)</span>
                    <div class="input-group mb-3">
                    <textarea name="map_keywords" rows="3" cols="3"
                              class="form-control @error('map_keywords') is-invalid @enderror">{{$course->map_keywords}}</textarea>
                    </div>
                    @error('map_keywords')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            


            <button type="submit" class="btn btn-outline-primary">Save Changes</button>
        </form>
    </div>
@endsection

@section('title_page') 
Create the Course
@endsection




@section('js')

@endsection