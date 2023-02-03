<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::query();
        
       $projects->when($request->project_name, function($query) use ($request){
        return $query->where('project_name', 'like', '%'.$request->project_name.'%');
       });

       $projects->when($request->client_id, function($query) use ($request){
        return $query->whereClient_id($request->client_id);
     });

       $projects->when($request->project_status, function($query) use ($request){
        return $query->whereProject_status($request->project_status);
     });

        return view('welcome', ['projects' => $projects->paginate(5)]);
    }

    public function deleteProject(Request $request)
    {
        // print_r ($request->ids);
        $ids = $request->ids;
        Project::whereIn('project_id',$ids)->delete();
        return redirect()->back();
    }

    public function editProject($project_id)
    {
     print_r($project_id);

    }

    public function createProject(Request $request)
    {
        //Store Record to the Table
        $request->validate([
            'project_name' => 'required',
            'client_id' => 'required',
            'project_start' => 'required',
            'project_end' => 'required',
            'project_status' => 'required',
        ]);
        Project::create($request->all());
        return redirect()->route('welcome')->with('success', 'Project Added Successfully!');
    }
}