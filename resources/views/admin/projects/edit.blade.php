@extends('layouts.app')

@section('pageTitle')

edit

@endsection

@section('content')
<maih>
    <section>
        <div class="container w-50 mt-5">
            <h1>Edit your project!</h1>

            <form action="{{ route('projects.update', $project) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $project->title) }}">
                </div>

                <div class="mb-3">
                    <label for="type_id">Project Type</label>
                    <select class="form-control" name="type_id" id="type_id">
                        <option value="">-- Select Type --</option>
                        @foreach ($types as $type)                        
                            <option @selected($type->id == old('type_id')) value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" row="10" class="form-control" id="description"
                        name="description">{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="creation_date" class="form-label">Creation Date</label>
                    <input type="date" class="form-control" id="creation_date" name="creation_date"
                        value="{{ old('creation_date', $project->creation_date) }}">
                </div>



                <button type="submit" class="btn btn-primary">Edit</button>
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