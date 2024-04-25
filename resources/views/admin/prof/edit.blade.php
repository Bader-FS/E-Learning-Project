@extends('admin.master')

@section('title')
Edit Prof Infos
@stop

@section('css')

@stop


@section('title_page') 
Edit Prof Infos
@endsection


@section('content') 
<div class="card-body">
        
        <form action="{{route('profs.update',$prof->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <label for="name">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$prof->name}}">
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
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$prof->email}}">
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
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$prof->phone}}">
                    </div>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            
            <button type="submit" class="btn btn-outline-primary">Save changes</button>
        </form>
    </div>
@endsection






@section('js')

@endsection