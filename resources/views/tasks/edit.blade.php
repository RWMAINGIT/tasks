<x-app-layout>
    <x-slot:heading>
        Edit Task: {{ $task->title }}
    </x-slot:heading>

    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PATCH')

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Task Details</h2>
                <p class="mt-1 text-sm text-gray-600">Edit the details of your task below.</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="To do something"
                                    value="{{ $task->title }}"
                                    required>
                            </div>

                            @error('title')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                            >
                                <input
                                    type="text"
                                    name="description"
                                    id="description"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="To do something"
                                    value="{{ $task->description }}"
                                    required>
                            </div>

                            @error('description')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="sm:col-span-4">
                        <label for="due_date" class="block text-sm font-medium leading-6 text-gray-900">Due Date</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                            >
                                <input
                                    type="text"
                                    name="due_date"
                                    id="due_date"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="To do something"
                                    value="{{ $task->due_date }}"
                                    required>
                            </div>

                            @error('due_date')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="assigned_to" class="block text-sm font-medium leading-6 text-gray-900">Assigned To</label>
                        <div class="mt-2">
                            <div                      
                            >
                                <select name="assigned_to" id="assigned_to" class="flex rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="" selected>Select a user</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                            </div>

                            @error('assigned_to')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="is_completed" class="block text-sm font-medium leading-6 text-gray-900">Is Completed</label>
                        <div class="mt-2">
                            <div>
                                <select name="is_completed" id="is_completed" class="flex rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option value="" selected>Select an option</option>
                                    <option value="1" {{ $task->is_completed ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ !$task->is_completed ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            @error('is_completed')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>









                </div>
            
            
            <div class="mt-6 flex items-center justify-between gap-x-6 pt-6">
            
                <div class="flex items-center ml-4">
                    <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
                    <span class="text-xs text-gray-500 ml-2">This action cannot be undone.</span>
                </div>

                <div class="flex items-center gap-x-6">
                    <a href="/tasks" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                    <div>
                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Update
                        </button>
                    </div>
                </div>
        </div>
            
            
            
            
            </div>
        </div>

        
    </div>
    </form>

    <form method="POST" action="/tasks/{{ $task->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-app-layout>