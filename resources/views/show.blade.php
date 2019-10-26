@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show {{ $pic->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <tr>
                            <!-- <th>Request headers</th> -->
                            <th>IP</th>
                            <th>Date</th>
                        </tr>
                        @foreach($pic->requests as $request)
                            <tr>
                                <!-- <td><pre>{{ var_dump($request->request) }}</pre></td> -->
                                <td>{{ $request->ip }}</td>
                                <td>{{ $request->created_at }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
