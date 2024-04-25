@extends('admin.master')

@section('title')
Create Professor
@stop


@section('css')

@stop


@section('content') 
<div class="card-body">
        
        <form action="{{route('profs.store')}}" method="post">
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
            </div>

            <div class="row">
                <div class="col">
                    <label for="email">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            
            <div class="row">
                <div class="col">
                    <label for="phone">Phone</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                    </div>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            
            <button type="submit" class="btn btn-outline-primary">Create Prof</button>
        </form>
    </div>
@endsection

@section('title_page') 
Create New Professor
@endsection




@section('js')

@endsection