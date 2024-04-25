@extends('admin.master')

@section('title')
Create Domains
@stop


@section('css')

@stop


@section('content') 
<div class="card-body">
        
        <form action="{{route('domains.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="name">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="slug">Slug</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug">
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
                                class="form-control @error('description') is-invalid @enderror"></textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="image">Image</label>
                    <div class="input-group mb-3 col">
                        <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            
            <div class="row">
                <div class="col">
                    <label for="is_active">is Active</label>
                    <div class="input-group mb-3">
                        <input type="checkbox" class="" id="is_active" name="is_active">
                    </div>

                </div>
                <div class="col">
                    <label for="is_popular">is Popular</label>
                    <div class="input-group mb-3 col">
                        <input type="checkbox" class="" id="is_popular" name="is_popular">
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-outline-primary">Create Domain</button>
        </form>
    </div>
@endsection

@section('title_page') 
Create New Domain
@endsection




@section('js')

@endsection