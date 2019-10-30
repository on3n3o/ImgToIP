@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ImgToIP</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if ($errors->any() ?? false)
                                @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                                @endforeach
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
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-lg-12">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Preview</th>
                                    <th>Link to tracking img</th> 
                                    <th>Actions</th>
                                </tr>
                                @foreach($pics as $pic)
                                <tr>
                                    <td>{{$pic->name}}</td>
                                    <td><img src="/storage/{{ $pic->path }}" width="100px"></td>
                                    <td><a href="{{ config('app.url') }}/picture/{{ $pic->uuid }}">{{ config('app.url') }}/picture/{{ $pic->uuid }}</a></td>
                                    <td><a href="/pic/{{ $pic->id }}" class="btn btn-xs btn-primary"><i class="fa fa-search text-light"></i></a></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <label class="label">Select this image and copy and paste into email to track: 
                                            <button class="btn btn-xs btn-success show-image" data-id="{{ $pic->id }}" data-href="{{ config('app.url') }}/picture/{{ $pic->uuid }}">Show image</button>
                                        </label>
                                        <p id="image-preview-{{ $pic->id }}">
                                        </p>
                                    <td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="pull-right">
                                {{ $pics->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '.show-image', function(e){
        e.preventDefault();
        var _this = $(this);
        var id = _this.attr('data-id');
        var href = _this.attr('data-href');
        $('#image-preview-' + id).prepend('<img src="' + href + '?track=true&random=8ymQJ6a4cR3HCyGsKYkx0DgfVDsOXD86NCgnZfSaBO1xHanzbvJxqqnxm7X262KuizsvP5KfpJZDCfHQdiyK2x6ZtAj8cxaY8FOlmz2aVo2QVfjoN1UnQp9m0N93jFRShlOSU9oQL7EXtQnICSlPS4V9NeZBYiguf0aZzXplPjPQ2Ap8hTGI7eprmN3Z9Q2xifGxVnoSgwVV4dZPDdD0EWm7y8Z0WiH4zMflZJoPWt4DzJOSa85kYsSRWqx39Qr&other_random=rgmlOevHHf2m6oel4Fm95XcSbGZpIwaBbJbLuASFkl6nc2fuGnVC6CM9Zm38hPbXc8rDKHEZl2xFZKaLqlZZpthHGOG2k6AgOmxudCtSmPWMRLT3mvWPciqiaXZna64uo9SIK23rMixdAO2ojNdMHdKaJZxt9c5Sa2dANEcuwOCDFN0hZauNdwp25pyPV6sSh5JWNmq5kTW11tNHsYiOIROhNpZFSMXQ6vV1Cgp4EBwq6qIqhWwMNhOmi4GpSBQOPLwxB91Obb3X1YcIFB05XpQ4epVp0CzcIQ" width="100px">');
    });
</script>
@endsection

