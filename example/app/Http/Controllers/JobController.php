<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('employer')->latest()->paginate(5);
        return view('jobs.index',[
            'jobs' => $jobs
        ]);
    }
    public function show(job $job){
        return view('jobs.show', ['job' => $job]);
    }
    public function create(){
        return view('jobs.create');
    }
    public function store(){
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);
        return redirect('/jobs');
    }
    public function edit(job $job){
        return view('jobs.edit', ['job' => $job]);
    }
    public function update(job $job){
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);
        return redirect('/jobs/'.$job);
    }
    public function destroy(job $job){
        $job->delete();
        return redirect('/jobs');
    }
}
