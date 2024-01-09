@extends('layouts.backend_master')
@section('title','Edit Tag')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Edit Create</h1>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update form</h6>

                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif

                    <form action="{{route('backend.tag.update',$data['record']->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$data['record']->title}}" placeholder="Enter Title"/>
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{$data['record']->slug}}" placeholder="Enter Slug"/>

                            @error('slug')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            @if($data['record']->status==1)
                                <input type="radio"  name="status" value="1"  checked/>Active
                                <input type="radio"  name="status" value="0"  /> De-Active
                            @else
                                <input type="radio"  name="status" value="1" />Active
                                <input type="radio"  name="status" value="0"  checked/> De-Active

                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" value="Update Tag" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
