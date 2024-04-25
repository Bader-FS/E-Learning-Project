@extends('admin.master')

@section('title')
Edit domains
@stop

@section('css')

@stop


@section('title_page') 
Edit The Domain
@endsection


@section('content') 
<div class="card-body">
        @if(session('error_catch'))
        <div class="bg-danger">{{session('error_catch')}}</div>
        @endif
        <form action="{{route('domains.update',$domain->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <label for="name">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$domain->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="slug">Slug</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug" value="{{$domain->slug}}">
                    </div>
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="description">Description</label>
                    <div class="input-group mb-3">
                        <textarea name="description" rows="3" cols="3"
                                  class="form-control @error('description') is-invalid @enderror">{{$domain->description}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="image">Image</label>
                    <div class="input-group mb-3 col">
                        <img src="{{Storage::url($domain->image)}}" alt="" class="img-thumbnail" style="max-width:200px;">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>

            </div>

            

            <div class="row">
                <div class="col">
                    <label for="is_active">is Active</label>
                    <div class="input-group mb-3">
                        <input type="checkbox" class="" id="is_active" name="is_active" {{($domain->is_active == 1) ?'checked' : ''}}>
                    </div>

                </div>
                <div class="col">
                    <label for="is_popular">is Popular</label>
                    <div class="input-group mb-3 col">
                        <input type="checkbox" class="" id="is_popular" name="is_popular" {{($domain->is_popular == 1) ?'checked' : ''}}>
                    </div>
                </div>
            </div>
           
           
            <button type="submit" class="btn btn-outline-primary">Save Changes</button>
        </form>
    </div>
@endsection






@section('js')

@endsection