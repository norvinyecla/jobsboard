<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Job;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::where('id', '>', '0')->orderBy('created_at', 'desc')->paginate(3);
        $title = "Latest Job Posts";
        return view('jobs', ['jobs' => $jobs, 'title' => $title]);
    }

    public function myJobPosts(){
        $jobs = Job::where('employer_id', \Auth::id())->orderBy('created_at', 'desc')->paginate(3);
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
            'description' => 'required|max:1000',
            'location' => 'required|max:50',
            'salary' => 'required'
        ]);

        $request->merge(array("employer_id" => \Auth::id()));
        $data = $request->all();
        Job::create($data);
        return redirect('/jobs/my-job-posts');
    }

    public function edit($id){
        $job = Job::find($id);

        if (Gate::denies('update', $job)) {
            abort(403);
        }

        return view('jobs.edit', [ 'job' => $job]);

    }

    public function update(Request $request){
        $this->validate($request, [
            'title' => 'required|max:50',
            'description' => 'required|max:1000',
            'location' => 'required|max:50',
            'salary' => 'required'
        ]);

        $request->merge(array("employer_id" => \Auth::id()));        
        
        $job = Job::find($request['id']);

        if (Gate::denies('update', $job)) {
            abort(403);
        }
        
        $job['title'] = $request['title'];
        $job['description'] = $request['description'];
        $job['location'] = $request['location'];
        $job['salary'] = $request['salary'];
        $job['employer_id'] = $request['employer_id'];
        $job->update();

        return redirect()->route('jobs.show', [ 'job' => $job])->with('success', 'Job updated.');;
        
    }

    public function destroy($id){
        $job = Job::find($id);
        if (Gate::denies('delete', $job)) {
            abort(403);
        }
        $job->delete($job);

        return redirect('/')->with('success', 'Job was deleted');
    }
}
