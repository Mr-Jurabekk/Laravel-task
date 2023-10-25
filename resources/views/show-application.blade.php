<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="py-12">
                        <div class="w-full mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h4>#{{$application->id}} - {{$application->user->name}}</h4>
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <h5 class="card-title">{{$application->subject}}</h5>
                                        </div>
                                        <div class="card-body flex justify-between">
                                            <p class="card-text">{{$application->message}}</p>


                                        @if(!is_null($application->file_url))
                                                <a href="{{ asset('storage/'.$application->file_url) }}"
                                                   class=" h-10 text-xl" target="_blank"><i class="fa-solid fa-file-circle-check fa-xl"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="card-footer flex justify-between">
                                            <div>{{$application->user->email}}</div>
                                            <div>{{$application->created_at}}</div>
                                        </div>

                                        @if(! $application->answer()->exists())
                                            <a class="btn btn-success rounded p-2" href="{{route('answer.create', ['applications' => $application->id])}}">
                                                Reply
                                            </a>
                                        @else
                                            <hr class="m-0">
                                            <div class="p-2">
                                                <div class="text-danger">Answer:</div>

                                                <p class="ml-2">{{ $application->answer->body }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mt-4">
                                        <a href="{{route('dashboard')}}">Go back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
