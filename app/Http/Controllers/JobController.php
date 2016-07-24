<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Job;

class JobController extends Controller
{
    public function index(){
    	// fetch 3 posts from database
    	$jobs = Job::orderBy('created_at', 'desc')->get();

    	$title = "Latest Job Posts";
    	return view('jobs', ['jobs' => $jobs, 'title' => $title]);
    }

    public function show($slug){

    }

    public function create($data){

    }

    public function store(){

    }

    public function edit($data){

    }

    public function update(){

    }

    public function destroy(){

    }
}
