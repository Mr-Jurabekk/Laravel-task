<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnswerApplicationController extends Controller
{

    public function index()
    {
        return view('answer.user-page.index');
    }
    public function create(Applications $applications)
    {
        if (! Gate::allows('answer-application', auth()->user())) {
            abort(401);
        }

        return view('answer.create', ['application' => $applications]);
    }

    public function store(Applications $applications, Request $request)
    {
        if (! Gate::allows('answer-application', auth()->user())) {
            abort(401);
        }

        $request->validate(['body' => 'required']);


        $applications->answer()->create([
           'body' => $request->body
        ]);

//        AnswerApplication::create([
//           'applications_id' => $application->id,
//            'body'=> $request->body,
//        ]);

        return redirect()->route('dashboard');
    }
}
