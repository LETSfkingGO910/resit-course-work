<div class="mb-4">
    <label class="block mb-1">Title</label>
    <input
        type="text"
        name="title"
        value="{{ old('title', $task->title ?? '') }}"
        class="w-full border rounded p-2"
    >
    @error('title')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block mb-1">Description</label>
    <textarea
        name="description"
        class="w-full border rounded p-2"
    >{{ old('description', $task->description ?? '') }}</textarea>
    @error('description')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block mb-1">Status</label>
    <select name="status" class="w-full border rounded p-2">
        <option value="pending" {{ old('status', $task->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="in_progress" {{ old('status', $task->status ?? '') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
        <option value="completed" {{ old('status', $task->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
    </select>
    @error('status')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block mb-1">Priority</label>
    <select name="priority" class="w-full border rounded p-2">
        <option value="low" {{ old('priority', $task->priority ?? '') == 'low' ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ old('priority', $task->priority ?? '') == 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ old('priority', $task->priority ?? '') == 'high' ? 'selected' : '' }}>High</option>
    </select>
    @error('priority')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block mb-1">Due Date</label>
    <input
        type="date"
        name="due_date"
        value="{{ old('due_date', $task->due_date ?? '') }}"
        class="w-full border rounded p-2"
    >
    @error('due_date')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>
