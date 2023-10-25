<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Jobs\SendEmailJob;
use App\Mail\ApplicationCreated;
use App\Models\Applications;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Applications $applications)
    {
        return view('answer.user-page.index')->with('applications', auth()->user()->applications()->latest()->paginate(5));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    public function store(StoreApplicationRequest $request)
    {
        if ($this->checkdate()){
            return redirect()->back()->with('error', 'You can send an application one time a day!');
        }


        if ($request->hasFile('file')){

            $file = $request->file('file');
            $name = $file->hashName();

            $path = $request->file('file')->storeAs(
                'files', $name, 'public'
            );
        }


        $application = Applications::create([
           'user_id' => auth()->user()->id,
           'subject' => $request->subject,
           'message' => $request->message,
           'file_url' => $path ?? null
        ]);

        dispatch(new SendEmailJob($application));

        return redirect()->back()->with('success', 'The application has been sent successfully 😊');
    }

    /**
     * Display the specified resource.
     * @param Applications $applications
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Applications $application)
    {
        if (! Gate::allows('answer-application', auth()->user())) {
            abort(401);
        }

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
    public function destroy(Applications $application)
    {
        $application->delete();

        return redirect()->back();
    }

    protected function checkdate()
    {

        $last_app = \auth()->user()->applications()->latest()->first();
        if ($last_app == null){
            return false;
        }

        $app_created = Carbon::parse($last_app->created_at)->format('Y-m-d');
        $today = Carbon::now()->format('Y-m-d');

        if ($today == $app_created){
            return true;
        }
    }
}
