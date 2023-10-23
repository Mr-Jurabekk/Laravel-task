<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\ApplicationCreated;
use App\Models\Applications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard')->with([
            'applications' => Applications::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->hasFile('file')){

            $file = $request->file('file');
            $name = $file->hashName();

            $path = $request->file('file')->storeAs(
                'files', $name, 'public'
            );
        }

        $request->validate([
           'subject' => 'required',
           'message' => 'required',
           'file' => 'file|mimes:jpg,png,pdf,docx'
        ]);

        $application = Applications::create([
           'user_id' => auth()->user()->id,
           'subject' => $request->subject,
           'message' => $request->message,
           'file_url' => $path ?? null
        ]);

        dispatch(new SendEmailJob($application));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Applications $application)
    {
        return view('show-application')->with([
           'application' => $application
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
