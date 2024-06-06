@extends('layouts.app')
@section('title')
Index-pro
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
                    <p class="card-text">Project Type: {{ $project->type ? $project->type->name : '' }}</p>
                    <p><a href="{{ $project->link }}" class="card-link">My Github <i class="fa-brands fa-github"></i></a></p>
                    <p><a href="{{ $project->link }}/{{ $project->slug }}" class="card-link">Project Github </a><i class="fa-brands fa-github"></i></a></p>
                    <p><a href="{{ route('projects.show', $project) }}" class="card-link">Info <i class="fa-solid fa-circle-info"></i></a></p>

                </div>
            </div>

        </div>

        @endforeach
    </div>
</div>


@endsection