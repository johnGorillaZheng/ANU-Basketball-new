@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Your Competitions
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        Internal Competitions 
                        <div class="float-right">
                                <span class="badge badge-secondary">New Competition</span>
                        </div>
                    </div>

                    @foreach($competitions as $competition)
                        <div class="card mb-3">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary col-md-7">{{ $competition->name }}</button>
                                <button type="button" class="btn btn-danger col-md-3">publish</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
