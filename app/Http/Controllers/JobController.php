<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Job;

class JobController extends Controller
{
    public function index(){
    	// fetch 3 posts from database
    	$jobs = Job::orderBy('created_at', 'desc')->paginate(3);

    	$title = "Latest Job Posts";
    	return view('jobs', ['jobs' => $jobs, 'title' => $title]);
    }

    public function show($id){
        $job = Job::find($id);
        return view('jobs.show', ['job' => $job]);
    }

    public function create(){
        return view('jobs.new');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:50',
            'description' => 'required|max:100',
            'location' => 'required|max:50',
            'salary' => 'required'
        ]);

        $request->merge(array("employer_id" => \Auth::id()));        
        $data = $request->all();
        Job::create($data);
        return redirect('/');
    }

    public function edit($id){
        $job = Job::find($id);
        return view('jobs.edit', [ 'job' => $job]);

    }

    public function update($id, Request $request){
        $this->validate($request, [
            'title' => 'required|max:50',
            'description' => 'required|max:100',
            'location' => 'required|max:50',
            'salary' => 'required'
        ]);

        $request->merge(array("employer_id" => \Auth::id()));        
        
        $job = Job::find($id);
        $job['title'] = $request['title'];
        $job['description'] = $request['description'];
        $job['location'] = $request['location'];
        $job['salary'] = $request['salary'];
        $job['employer_id'] = $request['employer_id'];
        $job->save();
        return redirect('/jobs/show/'.$request['id']);
    }

    public function destroy(){

    }
}
