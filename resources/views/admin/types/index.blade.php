@extends('layouts.app')
@section('title')
Index-typ
@endsection

@section('content')


<div class="container w-50">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Project Type</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            @foreach ($types as $type)
                <tbody>
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td><a href="{{ route('types.edit', $type) }}" class="btn btn-primary">Edit</a></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        <button class="btn btn-primary w-25">Create a new Type</button>








        <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-5 card-group">
                    <div class="card" >
                        <div class="card-body">
                            <h2 class="card-title">{{ $type->title }}</h2>
                            <p class="card-text">Created: {{ $type->creation_date }}</p>
                            <p class="card-text">type Type: {{ $type->type ? $type->type->name : '' }}</p>
                            <p><a href="{{ $type->link }}" class="card-link">Link to my Github</a></p>
                            <p><a href="{{ $type->link }}/{{ $type->slug }}" class="card-link">Link to repository on Github</a></p>
                            <p><a href="{{ route('types.show', $type) }}" class="card-link">Info</a></p>

                        </div>
                    </div>

                </div> -->

    </div>
</div>


@endsection