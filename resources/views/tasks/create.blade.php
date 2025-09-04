<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create task') }}
        </h2>
    </x-slot>

   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Task Details</h2>
                <form method="POST" action="/tasks">
                    @csrf

                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-1">
                                <x-form-field>
                                    <x-label for="title">Title</x-label>

                                    <div class="mt-2">
                                        <x-input name="title" id="title" placeholder="Task title" value="{{ old('title') }}" />

                                        <x-input-error for="title" name="title" />
                                    </div>
                                </x-form-field>

                                <x-form-field>
                                    <x-label for="description">Description</x-label>

                                    <div class="mt-2">
                                        <x-input name="description" id="description" placeholder="Task description" value="{{ old('description') }}" />

                                        <x-input-error for="description" name="description" />
                                    </div>
                                </x-form-field>
                            </div>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">   
                                <x-form-field>
                                    <x-label for="due_date">Due Date</x-label>

                                    <div class="mt-2">
                                        <x-input name="due_date" id="due_date" placeholder="yyyy-mm-dd" value="{{ old('due_date') }}" />

                                        <x-input-error for="due_date" name="due_date" />
                                    </div>
                                </x-form-field>

                                <x-form-field>
                                    <x-label for="assigned_to">Assign To (User ID)</x-label>

                                    <div class="mt-2">
                                        <select name="assigned_to" id="assigned_to" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="" selected>Select a user</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>

                                        <x-input-error for="assigned_to" name="assigned_to" />
                                    </div>
                                </x-form-field>

                                <x-form-field>
                                    <x-label for="is_completed">Is Completed</x-label>

                                    <div class="mt-2">
                                        <select name="is_completed" id="is_completed" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="0" selected>No</option>
                                            <option value="1">Yes</option>
                                        </select>

                                        <x-input-error for="is_completed" name="is_completed" />
                                    </div>
                                </x-form-field>
                            
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="/tasks" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <x-button>Save</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>