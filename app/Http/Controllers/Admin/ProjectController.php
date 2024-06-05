<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::orderBy('name', 'asc')->get();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //La validazione la fa StoreProjectRequest

        // $request->validate([
        //     'title'=> 'required|max:200',
        //     'creation_date'=> 'required|date',
        //     'description'=> 'nullable',
        // ]);

        // $form_data = $request->all();

        $form_data = $request->validated();// per la validazione

        $new_project = new Project();

        $new_project->title = $form_data['title'];
        $new_project->slug = Str::slug($new_project->title);
        $new_project->link = 'https://github.com/Cigno05/'.(Str::slug($new_project->title));
        $new_project->creation_date = $form_data['creation_date'];
        $new_project->description = $form_data['description'];
        $new_project->type_id = $form_data['type_id'];

        $new_project->save();

        return to_route("projects.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $types = Type::orderBy('name', 'asc')->get();

        return view("admin.projects.edit", compact("project"), compact('types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        // la validazione la fa UpdateProjectRequest

        // $request->validate([
        //     'title'=> 'required|max:200',
        //     'creation_date'=> 'required|date',
        //     'description'=> 'nullable',
        // ]);

        // $form_data = $request->all();

        $form_data = $request->validated();// per la validazione

        // $project->fill($form_data);
        // $project->slug = Str::slug($project->title);

        $project->title = $form_data['title'];
        $project->slug = Str::slug($project->title);
        $project->link = 'https://github.com/Cigno05';
        $project->creation_date = $form_data['creation_date'];
        $project->description = $form_data['description'];
        $project->type_id = $form_data['type_id'];

        $project->save();

        return to_route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route("projects.index");
    }
}
