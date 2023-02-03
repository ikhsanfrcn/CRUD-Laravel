@extends('layouts.main')
@section('content')


<main class="pt-32">
    <div class="grid gap-y-10 p-5 container mx-auto border border-black">
        <h1 class="text-4xl">Project</h1>
        <div class="px-10">
            <form class="grid grid-cols-7 gap-x-5 py-5 px-10 items-end border border-black" action="/" method="get">
                @csrf
                <div class="grid grid-rows-2 ">
                    <div class="row-span-2">
                        <p class="pb-2">Filter</p>
                    </div>
                </div>
                <div class="grid grid-rows-2 col-span-2 items-center">
                    <label class="">Project Name</label>
                    <input name="project_name" class="form-control border border-black" type="text"
                        value="{{isset($_GET['project_name']) ? $_GET['project_name'] : ''}}">
                </div>
                <div class="grid grid-rows-2 items-center">
                    <label class="">Client</label>
                    <div class="relative border border-black">
                        <select class="appearance-none w-full px-2 bg-white" name="client_id">
                            <option value="">All Client</option>
                            <option value="1" select="{{isset($_GET['client_id']) && $_GET['client_id'] == '1'}}">NEC
                            </option>
                            <option value="2" select="{{isset($_GET['client_id']) && $_GET['client_id'] == '2'}}">TAM
                            </option>
                            <option value="3" select="{{isset($_GET['client_id']) && $_GET['client_id'] == '2'}}">TUA
                            </option>
                        </select>
                        <div
                            class="pointer-events-none absolute right-0 top-0 bottom-0 flex items-center px-2 text-gray-700 border-l">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="grid grid-rows-2 items-center">
                    <label class="">Status</label>
                    <div class="relative border border-black">
                        <select class="appearance-none w-full px-2 bg-white" name="project_status">
                            <option value="">All Status</option>
                            <option value="open"
                                select="{{isset($_GET['project_status']) && $_GET['project_status'] == 'open'}}">OPEN
                            </option>
                            <option value="doing"
                                select="{{isset($_GET['project_status']) && $_GET['project_status'] == 'doing'}}">DOING
                            </option>
                            <option value="done"
                                select="{{isset($_GET['project_status']) && $_GET['project_status'] == 'done'}}">DONE
                            </option>
                        </select>
                        <div
                            class="pointer-events-none absolute right-0 top-0 bottom-0 flex items-center px-2 text-gray-700 border-l">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!--  -->
                <button type="submit" class="border h-1/2 border-black bg-neutral-300 hover:bg-neutral-200">Search</button>
                <button type="" class="border h-1/2 border-black">Clear</button>
            </form>
        </div>
        <!-- BUTTON -->
        <div class="grid grid-cols-12 gap-x-5">
            <button type="submit" class="border border-black bg-neutral-300 hover:bg-neutral-200">New</button>
            <button type="submit" form="deleteForm" class="border border-black bg-neutral-300 hover:bg-neutral-200" onclick="return confirm('Apakah yakin menghapus data?')">Delete</button>
        </div>
        <form action="/delete-project" id="deleteForm" method="POST">
            @csrf
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-neutral-300">
                        <th class="border-collapse border border-black"><input type="checkbox" name="" id=""></th>
                        <th class="border-collapse border border-black">Action</th>
                        <th class="border-collapse border border-black">Project Name</th>
                        <th class="border-collapse border border-black">Client</th>
                        <th class="border-collapse border border-black">Project Start</th>
                        <th class="border-collapse border border-black">Project End</th>
                        <th class="border-collapse border border-black">Status</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $projects)
                    <tr>
                        <td class="border-collapse border border-black text-center"><input type="checkbox"
                                name="ids[{{ $projects->project_id }}]" value="{{$projects->project_id}}">
                        </td>
                        <td class="border-collapse border border-black text-center text-blue-600 hover:text-blue-300"><a
                                href="/edit-project/{{ $projects->project_id }}">Edit</a></td>
                        <td class="border-collapse border border-black pl-2">{{$projects->project_name}}</td>
                        <td class="border-collapse border border-black pl-2">{{$projects->client_id}}</td>
                        <td class="border-collapse border border-black pl-2">{{date('d-F-Y', strtotime($projects->project_start))}}</td>
                        <td class="border-collapse border border-black pl-2">{{date('d-F-Y', strtotime($projects->project_start))}}</td>
                        <td class="border-collapse border border-black pl-2">{{$projects->project_status}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No projects found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </form>
    </div>
</main>
@endsection