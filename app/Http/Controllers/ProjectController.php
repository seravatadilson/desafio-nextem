<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use App\Project;
use App\Status;
use App\User;

class ProjectController extends Controller
{
    //
    public function index(){

        $projects = Project::all();

        ///return $projects;
        return view('layouts.project.index', ['projects'=>$projects]);

    }

    public function store(Request $request)
    {
        $user =  auth()->user();
       
        $validate = $request->validate(
           [
            'name'=>'required'
           ]
        );

        if($validate) {
          $created =  $user->project()->create([
            'name' => $request->name
           ]);
        }else{
        return redirect()->back()->withErrors('errors', 'Opa! algo deu errado tente novamente!');
        }
        return redirect()->route('admin.index')->with('success', 'Cadastro com sucesso!');
    }
    public function addActivities($id)
    {
        $projects = Project::all();
        $project = $projects->find($id);
        $users =  User::all();

        $collection = collect($users);
        $filtered = $collection->where('isAdmin', 0);
        $user = $filtered->all();

        $status = Status::all();

       return view('layouts.project.activities-project',['users'=>$user, 'status'=>$status, 'project'=>$project]);
    }
    public function storeActivity(Request $request){
        

        $newActivity = new Activity();
        $newActivity->create([

            'name'=>$request->activity,
            'description'=>$request->description,
            'project_id'=>$request->projects_id,
            'user_id'=>$request->user_id,
            'status_id'=>$request->status_id,
            'deadline'=>$request->deadline,
        ]);
       if($newActivity){
            return redirect()->route('admin.link-activities',['id'=>$request->projects_id])->with('success', 'Cadastro com sucesso!');
       }
    }
    public function showActivities($id){
       
        $projects = new Project();
        $project = $projects->where('id', $id)->with(['activity.status','activity.users'])->get();
        
        //return $project;
        return view('layouts.project.shows', ['projects'=>$project]);

    }
}
