@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Your Competitions
                </div>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create New Competition</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="competitionName">Competition Name:</label>
                                            <input type="text" class="form-control" id="competitionName" placeholder="new competition">
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="competitionIcon">
                                            <label class="custom-file-label" for="competitionIcon">Choose your icon</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Add now</button>
                                </div>
                            </div>
                        </div>
                      </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-4">
                        Internal Competitions 
                        <div class="float-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                New Competition
                            </button>
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
