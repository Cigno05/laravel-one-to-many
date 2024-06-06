@extends('layouts.app')

@section('pageTitle')

show

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">Project Type: {{ $project->type ? $project->type->name : '' }}</p>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-text">Created: {{ $project->creation_date }}</p>
                    <p><a href="{{ $project->link }}" class="card-link">Link to my Github</a></p>
                    <p><a href="{{ $project->link }}/{{ $project->slug }}" class="card-link">Link to repository on Github</a></p>
                    <div class="d-flex gap-2">
                        @auth
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit</a>
                        <form class="form-delete" action="{{ route('projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">Delete</button>

                                    <div class="my-modal">
                                        <div class="modal-container">
                                            <h5 class="text-center me-5">Delete this project?</h5>
                                            <button class="btn btn-danger modal-run mx-5">Yes, Delete</button>
                                            <button class="btn btn-success modal-stop">No, Comeback</button>
                                        </div>
                                    </div>

                                </form>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection