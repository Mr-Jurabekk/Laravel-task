<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Apply') }}
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
                                    @if($applications)


                                        <h4>My applications</h4>
                                        @foreach($applications as $key => $application)
                                            <div class="flex justify-between">
                                                <div>#{{$key + 1}}</div>
                                                <div class="card mb-4 w-full">
                                                    <div class="card-header text-center">
                                                        <h5 class="card-title">{{$application->subject}}</h5>
                                                    </div>
                                                    <div class="card-body flex justify-between">
                                                        <p class="card-text">{{$application->message}}</p>


                                                        @if(!is_null($application->file_url))
                                                            <a href="{{ asset('storage/'.$application->file_url) }}"
                                                               class=" h-10 text-xl" target="_blank"><i
                                                                    class="fa-solid fa-file-circle-check fa-xl"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <div class="card-footer flex justify-between">
                                                        <div>{{$application->user->email}}</div>
                                                        <div>{{$application->created_at}}</div>
                                                    </div>

                                                    @if($application->answer()->exists())
                                                        <div class="text-danger">Answer:</div>
                                                        <p class="ml-2">{{ $application->answer->body }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                        @endforeach

                                        {{$applications->links()}}
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
