@extends('layouts.app')

@section('pageTitle')

create

@endsection

@section('content')
<maih>
    <section>
        <div class="container w-50 mt-5">
            <h1>Add a new project!</h1>

            <form action="{{ route('projects.store') }}" method="POST">

                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Project title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" row="10" class="form-control" id="description" name="description" placeholder="Project description"></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="creation_date" class="form-label">Creation Date</label>
                    <input type="date" class="form-control" id="creation_date" name="creation_date">
                </div>
                


                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
</maih>

@endsection