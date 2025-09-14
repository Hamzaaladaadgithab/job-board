<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job as JobsJob;



class JobController extends Controller
{

    public function index() {

        $data = Job::all();

        return view("job/index", ['jobs' => $data ,   'name' => 'ahmed']);

}






}
