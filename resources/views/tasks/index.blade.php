<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
        <a href="/tasks/create" class="mt-6 text-sm font-semibold leading-6 text-gray-900 px-4 py-2 bg-green-400 border border-gray-300 rounded-md">Add task</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                @if($tasks->isEmpty())
                    <p class="text-gray-500">No tasks found.</p>
                @else  
                <table class="table-fixed w-full border-collapse border border-slate-400">
                <thead>
                    <tr>
                    <th class="text-left">Task</th>

                    <th width="10%" class="text-left">Due Date</th>
                    <th width="10%" class="text-left">Assigned To</th>
                    <th width="10%" class="text-left">Is Completed</th>
                    <th width="10%">Open</th>
                    <th width="5%">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        
                        <td class="border px-4 py-2">{{ $task->title }}</td>
                        <td class="border px-4 py-2">{{ $task->due_date }}</td>
                        <td class="border px-4 py-2">
                            
                            @foreach ($users as $user)
                                @if ($user->id === $task->assigned_to)
                                    {{ $user->name }}
                                @endif
                            @endforeach
                        </td>
                        <td class="border px-4 py-2 @if ($task->is_completed) bg-green-200 @else bg-red-200 @endif">{{ $task->is_completed ? 'Yes' : 'No' }}</td>
                        <td class="border px-4 py-2 hover:bg-gray-100"><a href="/tasks/{{ $task['id'] }}">Open</a></td>
                        <td class="border px-4 py-2 hover:bg-gray-100"><a href="/tasks/{{ $task['id'] }}/edit">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
               
                </table>
                 <div class="mt-4">
                    {{ $tasks->links() }}
                </div>
                @endif


                
                
            </div>
        </div>
    </div>
</x-app-layout>