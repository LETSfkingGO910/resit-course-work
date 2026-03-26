<x-app-layout>
    <x-slot name="header">
        <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;">
            <h2 style="font-size:28px;font-weight:700;color:#1f2937;">
                Dashboard
            </h2>

            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <a href="{{ route('tasks.index') }}"
                   style="background:#2563eb;color:white;padding:10px 18px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                    View All Tasks
                </a>

                <a href="{{ route('tasks.create') }}"
                   style="background:#16a34a;color:white;padding:10px 18px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                    + Create Task
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:20px;margin-bottom:28px;">

                <div style="background:white;padding:22px;border-radius:16px;box-shadow:0 4px 14px rgba(0,0,0,0.08);">
                    <p style="font-size:14px;color:#6b7280;margin-bottom:8px;">Total Tasks</p>
                    <h3 style="font-size:32px;font-weight:700;color:#111827;">{{ $totalTasks }}</h3>
                </div>

                <div style="background:white;padding:22px;border-radius:16px;box-shadow:0 4px 14px rgba(0,0,0,0.08);">
                    <p style="font-size:14px;color:#6b7280;margin-bottom:8px;">Pending Tasks</p>
                    <h3 style="font-size:32px;font-weight:700;color:#92400e;">{{ $pendingTasks }}</h3>
                </div>

                <div style="background:white;padding:22px;border-radius:16px;box-shadow:0 4px 14px rgba(0,0,0,0.08);">
                    <p style="font-size:14px;color:#6b7280;margin-bottom:8px;">In Progress</p>
                    <h3 style="font-size:32px;font-weight:700;color:#1d4ed8;">{{ $inProgressTasks }}</h3>
                </div>

                <div style="background:white;padding:22px;border-radius:16px;box-shadow:0 4px 14px rgba(0,0,0,0.08);">
                    <p style="font-size:14px;color:#6b7280;margin-bottom:8px;">Completed Tasks</p>
                    <h3 style="font-size:32px;font-weight:700;color:#166534;">{{ $completedTasks }}</h3>
                </div>

                <div style="background:white;padding:22px;border-radius:16px;box-shadow:0 4px 14px rgba(0,0,0,0.08);">
                    <p style="font-size:14px;color:#6b7280;margin-bottom:8px;">High Priority</p>
                    <h3 style="font-size:32px;font-weight:700;color:#991b1b;">{{ $highPriorityTasks }}</h3>
                </div>

            </div>

            <div style="background:white;border-radius:16px;box-shadow:0 4px 14px rgba(0,0,0,0.08);overflow:hidden;">
                <div style="padding:24px;border-bottom:1px solid #e5e7eb;">
                    <h3 style="font-size:22px;font-weight:700;color:#111827;">
                        Recent Tasks
                    </h3>
                    <p style="font-size:14px;color:#6b7280;margin-top:6px;">
                        Here are your 5 most recent tasks.
                    </p>
                </div>

                <div style="padding:24px;">
                    @if($recentTasks->count())
                        <div style="overflow-x:auto;">
                            <table style="width:100%;border-collapse:collapse;">
                                <thead style="background:#f3f4f6;">
                                    <tr>
                                        <th style="text-align:left;padding:12px;border-bottom:1px solid #e5e7eb;">Title</th>
                                        <th style="text-align:left;padding:12px;border-bottom:1px solid #e5e7eb;">Status</th>
                                        <th style="text-align:left;padding:12px;border-bottom:1px solid #e5e7eb;">Priority</th>
                                        <th style="text-align:left;padding:12px;border-bottom:1px solid #e5e7eb;">Due Date</th>
                                        <th style="text-align:left;padding:12px;border-bottom:1px solid #e5e7eb;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentTasks as $task)
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
                                                    {{ $task->status }}
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
                                                    {{ $task->priority }}
                                                @endif
                                            </td>

                                            <td style="padding:12px;border-bottom:1px solid #e5e7eb;">
                                                {{ $task->due_date ?? 'No date' }}
                                            </td>

                                            <td style="padding:12px;border-bottom:1px solid #e5e7eb;">
                                                <a href="{{ route('tasks.show', $task->id) }}"
                                                   style="background:#4f46e5;color:white;padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600;">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div style="margin-top:20px;">
                            <a href="{{ route('tasks.index') }}"
                               style="background:#2563eb;color:white;padding:10px 18px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                                Go to Task List
                            </a>
                        </div>
                    @else
                        <div style="text-align:center;padding:40px 20px;">
                            <p style="font-size:18px;color:#6b7280;margin-bottom:18px;">
                                You do not have any tasks yet.
                            </p>

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
