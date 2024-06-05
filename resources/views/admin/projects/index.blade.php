@extends('layouts.app')
@section('title')
Index
@endsection

@section('content')


<div class="container">
    <div class="row">
        @foreach ($projects as $project)
        <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-5 card-group">
            <div class="card" >
                <div class="card-body">
                    <h2 class="card-title">{{ $project->title }}</h2>
                    <p class="card-text">Created: {{ $project->creation_date }}</p>
                    <p><a href="{{ $project->link }}" class="card-link">Link to my Github</a></p>
                    <p><a href="{{ $project->link }}/{{ $project->slug }}" class="card-link">Link to repository on Github</a></p>
                    <p><a href="{{ route('projects.show', $project) }}" class="card-link">Specs</a></p>

                    @auth
                    <p><a href="{{ route('projects.edit', $project) }}" class="card-link">Edit</a></p>
                    @endif
                </div>
            </div>

        </div>

        @endforeach
    </div>
</div>


@endsection