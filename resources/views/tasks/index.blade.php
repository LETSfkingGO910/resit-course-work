<x-app-layout>
    <x-slot name="header">
        <div style="display:flex;justify-content:space-between;align-items:center;">
            <h2 style="font-size:28px;font-weight:700;color:#1f2937;">
                My Tasks
            </h2>

            <a href="{{ route('tasks.create') }}"
               style="background:#2563eb;color:white;padding:10px 18px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                + Create Task
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div style="margin-bottom:20px;background:#dcfce7;border:1px solid #86efac;color:#166534;padding:12px 16px;border-radius:10px;">
                    {{ session('success') }}
                </div>
            @endif

            <div style="background:white;border-radius:16px;box-shadow:0 4px 14px rgba(0,0,0,0.08);overflow:hidden;">
                <div style="padding:24px;">

                    <form method="GET" action="{{ route('tasks.index') }}" style="margin-bottom:24px;">
                        <div style="display:flex;gap:12px;flex-wrap:wrap;align-items:end;">
                            <div>
                                <label style="display:block;font-weight:600;margin-bottom:6px;">Search</label>
                                <input type="text" name="search" value="{{ request('search') }}"
                                       placeholder="Search by title"
                                       style="padding:10px 12px;border:1px solid #d1d5db;border-radius:8px;min-width:220px;">
                            </div>

                            <div>
                                <label style="display:block;font-weight:600;margin-bottom:6px;">Status</label>
                                <select name="status"
                                        style="padding:10px 12px;border:1px solid #d1d5db;border-radius:8px;min-width:160px;">
                                    <option value="">All</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <div>
                                <label style="display:block;font-weight:600;margin-bottom:6px;">Priority</label>
                                <select name="priority"
                                        style="padding:10px 12px;border:1px solid #d1d5db;border-radius:8px;min-width:160px;">
                                    <option value="">All</option>
                                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                                </select>
                            </div>

                            <div style="display:flex;gap:10px;">
                                <button type="submit"
                                        style="background:#16a34a;color:white;padding:10px 18px;border:none;border-radius:8px;font-weight:600;cursor:pointer;">
                                    Filter
                                </button>

                                <a href="{{ route('tasks.index') }}"
                                   style="background:#6b7280;color:white;padding:10px 18px;border-radius:8px;font-weight:600;text-decoration:none;display:inline-block;">
                                    Reset
                                </a>
                            </div>
                        </div>
                    </form>

                    @if($tasks->count())
                        <div style="overflow-x:auto;">
                            <table style="width:100%;border-collapse:collapse;">
                                <thead style="background:#f3f4f6;">
                                    <tr>
                                        <th style="text-align:left;padding:12px;border-bottom:1px solid #e5e7eb;">Title</th>
                                        <th style="text-align:left;padding:12px;border-bottom:1px solid #e5e7eb;">Status</th>
                                        <th style="text-align:left;padding:12px;border-bottom:1px solid #e5e7eb;">Priority</th>
                                        <th style="text-align:left;padding:12px;border-bottom:1px solid #e5e7eb;">Due Date</th>
                                        <th style="text-align:left;padding:12px;border-bottom:1px solid #e5e7eb;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td style="padding:12px;border-bottom:1px solid #e5e7eb;">
                                                {{ $task->title }}
                                            </td>

                                            <td style="padding:12px;border-bottom:1px solid #e5e7eb;">
                                                @if($task->status === 'pending')
                                                    <span style="background:#fef3c7;color:#92400e;padding:4px 10px;border-radius:999px;font-size:12px;font-weight:600;">
                                                        Pending
                                                    </span>
                                                @elseif($task->status === 'in_progress')
                                                    <span style="background:#dbeafe;color:#1d4ed8;padding:4px 10px;border-radius:999px;font-size:12px;font-weight:600;">
                                                        In Progress
                                                    </span>
                                                @elseif($task->status === 'completed')
                                                    <span style="background:#dcfce7;color:#166534;padding:4px 10px;border-radius:999px;font-size:12px;font-weight:600;">
                                                        Completed
                                                    </span>
                                                @else
                                                    <span>{{ $task->status }}</span>
                                                @endif
                                            </td>

                                            <td style="padding:12px;border-bottom:1px solid #e5e7eb;">
                                                @if($task->priority === 'high')
                                                    <span style="background:#fee2e2;color:#991b1b;padding:4px 10px;border-radius:999px;font-size:12px;font-weight:600;">
                                                        High
                                                    </span>
                                                @elseif($task->priority === 'medium')
                                                    <span style="background:#fed7aa;color:#9a3412;padding:4px 10px;border-radius:999px;font-size:12px;font-weight:600;">
                                                        Medium
                                                    </span>
                                                @elseif($task->priority === 'low')
                                                    <span style="background:#e5e7eb;color:#374151;padding:4px 10px;border-radius:999px;font-size:12px;font-weight:600;">
                                                        Low
                                                    </span>
                                                @else
                                                    <span>{{ $task->priority }}</span>
                                                @endif
                                            </td>

                                            <td style="padding:12px;border-bottom:1px solid #e5e7eb;">
                                                {{ $task->due_date ?? 'No date' }}
                                            </td>

                                            <td style="padding:12px;border-bottom:1px solid #e5e7eb;">
                                                <div style="display:flex;gap:8px;flex-wrap:wrap;">
                                                    <a href="{{ route('tasks.show', $task->id) }}"
                                                       style="background:#4f46e5;color:white;padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600;">
                                                        View
                                                    </a>

                                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                                       style="background:#facc15;color:#111827;padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600;">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                onclick="return confirm('Are you sure you want to delete this task?')"
                                                                style="background:#dc2626;color:white;padding:8px 14px;border:none;border-radius:8px;font-weight:600;cursor:pointer;">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div style="text-align:center;padding:50px 20px;">
                            <p style="color:#6b7280;font-size:20px;margin-bottom:20px;">No tasks found.</p>
                            <a href="{{ route('tasks.create') }}"
                               style="background:#16a34a;color:white;padding:12px 20px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                                Create Your First Task
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

