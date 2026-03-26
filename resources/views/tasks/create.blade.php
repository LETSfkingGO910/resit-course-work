<x-app-layout>
    <x-slot name="header">
        <div style="display:flex;justify-content:space-between;align-items:center;">
            <h2 style="font-size:28px;font-weight:700;color:#1f2937;">
                Create New Task
            </h2>

            <a href="{{ route('tasks.index') }}"
               style="background:#6b7280;color:white;padding:10px 18px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                Back to Tasks
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div style="background:white;border-radius:16px;box-shadow:0 4px 14px rgba(0,0,0,0.08);overflow:hidden;">
                <div style="padding:28px;">

                    @if ($errors->any())
                        <div style="margin-bottom:20px;background:#fee2e2;border:1px solid #fca5a5;color:#991b1b;padding:14px 16px;border-radius:10px;">
                            <strong style="display:block;margin-bottom:8px;">Please fix the following errors:</strong>
                            <ul style="margin:0;padding-left:18px;">
                                @foreach ($errors->all() as $error)
                                    <li style="margin-bottom:4px;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf

                        <div style="margin-bottom:20px;">
                            <label for="title" style="display:block;font-weight:600;margin-bottom:8px;color:#111827;">
                                Title
                            </label>
                            <input type="text"
                                   id="title"
                                   name="title"
                                   value="{{ old('title') }}"
                                   placeholder="Enter task title"
                                   style="width:100%;padding:12px 14px;border:1px solid #d1d5db;border-radius:10px;outline:none;">
                        </div>

                        <div style="margin-bottom:20px;">
                            <label for="description" style="display:block;font-weight:600;margin-bottom:8px;color:#111827;">
                                Description
                            </label>
                            <textarea id="description"
                                      name="description"
                                      rows="5"
                                      placeholder="Enter task description"
                                      style="width:100%;padding:12px 14px;border:1px solid #d1d5db;border-radius:10px;outline:none;resize:vertical;">{{ old('description') }}</textarea>
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px;">
                            <div>
                                <label for="status" style="display:block;font-weight:600;margin-bottom:8px;color:#111827;">
                                    Status
                                </label>
                                <select id="status"
                                        name="status"
                                        style="width:100%;padding:12px 14px;border:1px solid #d1d5db;border-radius:10px;outline:none;">
                                    <option value="">Select status</option>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <div>
                                <label for="priority" style="display:block;font-weight:600;margin-bottom:8px;color:#111827;">
                                    Priority
                                </label>
                                <select id="priority"
                                        name="priority"
                                        style="width:100%;padding:12px 14px;border:1px solid #d1d5db;border-radius:10px;outline:none;">
                                    <option value="">Select priority</option>
                                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                    <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                                </select>
                            </div>
                        </div>

                        <div style="margin-bottom:24px;">
                            <label for="due_date" style="display:block;font-weight:600;margin-bottom:8px;color:#111827;">
                                Due Date
                            </label>
                            <input type="date"
                                   id="due_date"
                                   name="due_date"
                                   value="{{ old('due_date') }}"
                                   style="width:100%;padding:12px 14px;border:1px solid #d1d5db;border-radius:10px;outline:none;">
                        </div>

                        <div style="display:flex;gap:12px;flex-wrap:wrap;">
                            <button type="submit"
                                    style="background:#16a34a;color:white;padding:10px 20px;border:none;border-radius:10px;font-weight:600;cursor:pointer;">
                                Save Task
                            </button>

                            <a href="{{ route('tasks.index') }}"
                               style="background:#6b7280;color:white;padding:10px 20px;border-radius:10px;font-weight:600;text-decoration:none;display:inline-block;">
                                Cancel
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

