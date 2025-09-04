<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Task Details</h2>

                <div class="mt-10">
                    <h2 class="font-bold text-lg">{{ $task->title }}</h2>
                        <p>
                           {{ $task->description }}.
                        </p>
                        <p>
                            Due date: {{ $task->due_date }}
                        </p>
                        <p>
                            Assigned to: {{ $task->assigned_to }}
                        </p>
                        <p>
                            Completed: {{ $task->is_completed }}
                        </p>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <div class="mt-6 text-sm font-semibold leading-6 text-gray-900 px-4 py-2 bg-white border border-gray-300 rounded-md">
                                <a href="/tasks/{{ $task->id }}/edit">Edit task</a>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>