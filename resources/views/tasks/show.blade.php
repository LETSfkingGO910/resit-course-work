<x-app-layout>
    <x-slot name="header">
        <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;">
            <h2 style="font-size:28px;font-weight:700;color:#1f2937;">
                Task Details
            </h2>

            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <a href="{{ route('tasks.edit', $task->id) }}"
                   style="background:#facc15;color:#111827;padding:10px 18px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                    Edit Task
                </a>

                <a href="{{ route('tasks.index') }}"
                   style="background:#6b7280;color:white;padding:10px 18px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                    Back to Tasks
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div style="margin-bottom:20px;background:#dcfce7;border:1px solid #86efac;color:#166534;padding:12px 16px;border-radius:10px;">
                    {{ session('success') }}
                </div>
            @endif

            <div style="background:white;border-radius:16px;box-shadow:0 4px 14px rgba(0,0,0,0.08);overflow:hidden;">
                <div style="padding:28px;">

                    <div style="margin-bottom:24px;">
                        <h3 style="font-size:26px;font-weight:700;color:#111827;margin-bottom:8px;">
                            {{ $task->title }}
                        </h3>

                        <p style="color:#6b7280;font-size:14px;">
                            Created: {{ $task->created_at ? $task->created_at->format('Y-m-d H:i') : 'N/A' }}
                        </p>
                    </div>

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:24px;">
                        <div style="background:#f9fafb;padding:18px;border-radius:12px;border:1px solid #e5e7eb;">
                            <p style="font-size:13px;color:#6b7280;margin-bottom:8px;">Status</p>

                            @if($task->status === 'pending')
                                <span style="background:#fef3c7;color:#92400e;padding:6px 12px;border-radius:999px;font-size:13px;font-weight:600;">
                                    Pending
                                </span>
                            @elseif($task->status === 'in_progress')
                                <span style="background:#dbeafe;color:#1d4ed8;padding:6px 12px;border-radius:999px;font-size:13px;font-weight:600;">
                                    In Progress
                                </span>
                            @elseif($task->status === 'completed')
                                <span style="background:#dcfce7;color:#166534;padding:6px 12px;border-radius:999px;font-size:13px;font-weight:600;">
                                    Completed
                                </span>
                            @else
                                <span style="font-weight:600;">{{ $task->status }}</span>
                            @endif
                        </div>

                        <div style="background:#f9fafb;padding:18px;border-radius:12px;border:1px solid #e5e7eb;">
                            <p style="font-size:13px;color:#6b7280;margin-bottom:8px;">Priority</p>

                            @if($task->priority === 'high')
                                <span style="background:#fee2e2;color:#991b1b;padding:6px 12px;border-radius:999px;font-size:13px;font-weight:600;">
                                    High
                                </span>
                            @elseif($task->priority === 'medium')
                                <span style="background:#fed7aa;color:#9a3412;padding:6px 12px;border-radius:999px;font-size:13px;font-weight:600;">
                                    Medium
                                </span>
                            @elseif($task->priority === 'low')
                                <span style="background:#e5e7eb;color:#374151;padding:6px 12px;border-radius:999px;font-size:13px;font-weight:600;">
                                    Low
                                </span>
                            @else
                                <span style="font-weight:600;">{{ $task->priority }}</span>
                            @endif
                        </div>
                    </div>

                    <div style="margin-bottom:24px;background:#f9fafb;padding:18px;border-radius:12px;border:1px solid #e5e7eb;">
                        <p style="font-size:13px;color:#6b7280;margin-bottom:8px;">Due Date</p>
                        <p style="font-size:16px;color:#111827;font-weight:600;">
                            {{ $task->due_date ? $task->due_date : 'No due date set' }}
                        </p>
                    </div>

                    <div style="margin-bottom:28px;background:#f9fafb;padding:18px;border-radius:12px;border:1px solid #e5e7eb;">
                        <p style="font-size:13px;color:#6b7280;margin-bottom:10px;">Description</p>

                        @if($task->description)
                            <p style="font-size:15px;line-height:1.7;color:#111827;white-space:pre-line;">
                                {{ $task->description }}
                            </p>
                        @else
                            <p style="font-size:15px;color:#9ca3af;">
                                No description provided.
                            </p>
                        @endif
                    </div>

                    <div style="display:flex;gap:12px;flex-wrap:wrap;">
                        <a href="{{ route('tasks.edit', $task->id) }}"
                           style="background:#2563eb;color:white;padding:10px 20px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                            Edit
                        </a>

                        <a href="{{ route('tasks.index') }}"
                           style="background:#6b7280;color:white;padding:10px 20px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                            Back
                        </a>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this task?')"
                                    style="background:#dc2626;color:white;padding:10px 20px;border:none;border-radius:10px;font-weight:600;cursor:pointer;">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

