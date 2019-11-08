<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests\RegisterFormRequest;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class ActivityController extends Controller
{
    //
    protected $user;


    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    public function index()
    {
        $activity = $this->user->activity->get(['name', 'description'])->toArray();

        return $activity;
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'description'=>'required',
            'project_id'=>'required',
            'user_id'=>'required',
            'status_id'=>'required',
            'deadline'=>'required',
        ]);

        $activity = new Activity();

        
        $activity->name = $request->activity;
        $activity->description = $request->description;
        $activity->project_id = $request->projects_id;
        $activity->user_id = $request->user_id;
        $activity->status_id = $request->status_id;
        $activity->deadline = $request->deadline;

        if ($this->user->activity()->save($activity))
            return response()->json([
                'success' => true,
                'activity' => $activity
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, activity could not be added.'
            ], 500);
    }
}
