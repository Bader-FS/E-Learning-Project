@extends('admin.master')

@section('title')
Show Domain
@stop

@section('css')

@stop


@section('title_page') 
Show Details of {{$domain->name}} Domain
@endsection


@section('content') 
<div class="card-body">
        @if(session('error_catch'))
        <div class="bg-danger">{{session('error_catch')}}</div>
        @endif
        <form>
            
            <div class="row">
                <div class="col">
                    <label for="name">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" value="{{$domain->name}}" readonly>
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="slug">Slug</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="slug" value="{{$domain->slug}}" readonly>
                    </div>
                    
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="description">Description</label>
                    <div class="input-group mb-3">
                        <textarea name="description" rows="3" cols="3" readonly
                                  class="form-control">{{$domain->description}}</textarea>
                    </div>
                </div>
                <div class="col">
                    <label for="image">Image</label>
                    <div class="input-group mb-3 col">
                        <img src="{{Storage::url($domain->image)}}" alt="" class="img-thumbnail" style="max-width:200px;">
                    </div>
                </div>

            </div>

            

            <div class="row">
            <div class="col">
                    <label for="is_active">is Active</label>
                    <div class="input-group mb-3">
                        @if($domain->is_active == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Hidden</span>
                        @endif
                    </div>

                </div>
                <div class="col">
                    <label for="is_popular">is Popular</label>
                    <div class="input-group mb-3 col">
                        @if($domain->is_popular == 1)
                            <span class="badge badge-success">Popular</span>
                        @else
                            <span class="badge badge-danger">Not Popular</span>
                        @endif
                    </div>
                </div>
            </div>
           
        </form>
    </div>
@endsection






@section('js')

@endsection