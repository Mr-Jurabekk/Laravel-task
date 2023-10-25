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

                    <h2 class="text-center">Answer application  #{{$application->id}}</h2>

                    <form action="{{route('answer.store', ['applications' =>$application->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="mb-2" for="exampleInputMessage">Message</label>
                            <textarea class="form-control" name="body" id="exampleInputMessage" cols="30"
                                      rows="5"></textarea>
                        </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{route('applications.index')}}"  class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
