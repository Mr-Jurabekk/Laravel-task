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
                    @if(auth()->user()->role->name == 'Manager')

                        you are manager

                        {{ __("You're logged in as a Manager!") }}



                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Received time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($applications as $application)
                                <tr>
                                    <td>{{$application->id}}</td>
                                    <td>{{$application->user->name}}</td>
                                    <td>{{ $application->subject }}</td>
                                    <td>{{$application->created_at}}</td>
                                    <td>
                                        <div class="d-flex justify-between w-50">
                                            <div><a href="{{route('applications.show', ['application' => $application->id])}}"><i class="fa-solid fa-eye"></i></a></div>
                                            <div class="text-gray-300">|</div>
                                            <div><a class="text-danger" href="{{route('applications.destroy', ['application' => $application->id])}}"><i
                                                        class="fa-solid fa-trash-can"></i></a></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{$applications->links()}}
                    @else

                        @if(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{session()->get('error')}}
                            </div>
                            @endif
                            @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{session()->get('success')}}
                            </div>
                            @endif

                        <form action="{{route('applications.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="mb-2" for="exampleInputsubject">Subject</label>
                                <input type="text" name="subject" class="form-control" id="exampleInputsubject">
                            </div>
                            <div class="form-group mb-4">
                                <label class="mb-2" for="exampleInputMessage">Message</label>
                                <textarea class="form-control" name="message" id="exampleInputMessage" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label class="mb-2">File</label>
                                <input type="file" name="file" class="form-control">
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
