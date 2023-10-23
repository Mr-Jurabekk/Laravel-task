<?php

namespace App\Jobs;

use App\Mail\ApplicationCreated;
use App\Models\Applications;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $application;

    /**
     * Create a new job instance.
     * @param Applications $applications
     */
    public function __construct(Applications $applications)
    {
        $this->application = $applications;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $manager = User::first();

        Mail::to($manager)->send(new ApplicationCreated($this->application));
    }
}
