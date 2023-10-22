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
{{--                    @dd(auth()->user()->role)--}}
                    @if(auth()->user()->role->name == 'Manager')

                        you are manager

                    {{ __("You're logged in as a Manager!") }}

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Received time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Ali</td>
                                <td>Ali@gmail.com</td>
                                <td>2022-10-04 20:14</td>
                                <td>
                                    <div class="d-flex justify-between w-50">
                                        <div><a href=""><i class="fa-solid fa-eye"></i></a></div>
                                        <div class="text-gray-300">|</div>
                                        <div><a class="text-danger" href=""><i class="fa-solid fa-trash-can"></i></a></div>
                                    </div>
                                </td>

                            </tbody>
                        </table>
                    @else

                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="mb-2" for="exampleInputEmail1">Subject</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group mb-4">
                                <label class="mb-2" for="exampleInputPassword1">Message</label>
                                <textarea class="form-control" name="message" id="exampleInputPassword1" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label class="mb-2" for="exampleInputEmail1">File</label>
                                <input type="file" class="form-control" id="exampleInputEmail1">
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
