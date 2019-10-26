@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/pic" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name of this image">
                        </div>
                        <div class="form-group">
                            <label for="file">File:</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Preview</th>
                            <th>Link to tracking img</th> 
                            <th>Actions</th>
                        </tr>
                        @foreach(auth()->user()->pics as $pic)
                        <tr>
                            <td>{{$pic->name}}</td>
                            <td><img src="/storage/{{ $pic->path }}" width="100px"></td>
                            <td><a href="{{ config('app.url') }}/picture/{{ $pic->uuid }}">{{ config('app.url') }}/picture/{{ $pic->uuid }}</a></td>
                            <td><a href="/pic/{{ $pic->id }}" class="btn btn-xs btn-primary"><i class="fa fa-search text-light"></i></a></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <label class="label">Select this image and copy and paste into email to track:</label>
                                <p>
                                <img src="{{ config('app.url') }}/picture/{{ $pic->uuid }}">
                                </p>
                            <td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
