@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show {{ $pic->name }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <b>Name:</b> {{ $pic->name }}<br>
                            <b>Link to tracking image:</b> <a href="{{ config('app.url') }}/picture/{{ $pic->uuid }}">{{ config('app.url') }}/picture/{{ $pic->uuid }}</a><br>
                            <b>Link to view image without tracking:</b> <a href="/storage/{{ $pic->path }}">{{ config('app.url') }}/storage/{{ $pic->path }}</a><br>
                            <b>Current views with tracking:</b> {{ $pic->requests()->count() ?? 0 }}<br> 
                        </div>
                        <div class="col-lg-6">
                            <img src="/storage/{{ $pic->path }}" width="200px">
                        </div>
                    </div>
                    <table class="table">
                        <tr>
                            <th>IPs</th>
                            <th>Date</th>
                            <th>Request headers</th>
                        </tr>
                        @foreach($pic->requests as $request)
                            <tr>
                                <td>{{ $request->ip }}<br>
                                    {{ $request->ip_forwarded ?? ''}}<br>
                                    {{ $request->ip_forwarded_for ?? ''}}
                                </td>
                                <td>{{ $request->created_at }}</td>
                                <td ><textarea rows="10" cols="70">{{ var_dump($request->request) }}</textarea></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
