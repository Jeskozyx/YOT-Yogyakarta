<x-app-layout>
    {{-- HEADER SLOT --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Tasks
        </h2>
    </x-slot>

    {{-- DEPENDENCIES --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    {{-- STYLES --}}
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        [x-cloak] { display: none !important; }
        
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        /* Drag & Drop Visual Styles */
        .sortable-ghost {
            opacity: 0.4;
            background-color: #eef2ff;
            border: 2px dashed #6366f1;
        }
        .sortable-drag {
            cursor: grabbing;
            opacity: 1;
            background: white;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: rotate(2deg);
        }
    </style>

    {{-- PHP LOGIC: Membagi Data --}}
    @php
        $todoTasks = $tasks->where('status', 'pending');
        $progressTasks = $tasks->where('status', 'in_progress'); 
        $doneTasks = $tasks->where('status', 'completed');
    @endphp

    {{-- MAIN CONTAINER --}}
    <div x-data="{ viewMode: 'board' }" class="bg-gray-50 min-h-screen pb-12 font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            
            {{-- HEADER: Title, Search, Buttons --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 tracking-tight">My Tasks</h1>
                    <p class="text-gray-500 text-sm mt-1">Manage your daily goals. Drag cards to update status.</p>
                </div>

                <div class="flex items-center gap-3">
                    {{-- View Toggle --}}
                    <div class="bg-white p-1 rounded-xl border border-gray-200 shadow-sm flex items-center">
                        <button @click="viewMode = 'list'" 
                                :class="viewMode === 'list' ? 'bg-blue-50 text-blue-600 shadow-sm' : 'text-gray-500 hover:bg-gray-50'"
                                class="p-2 rounded-lg transition-all duration-200 flex items-center gap-2 text-sm font-medium px-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                            List
                        </button>
                        <button @click="viewMode = 'board'" 
                                :class="viewMode === 'board' ? 'bg-blue-50 text-blue-600 shadow-sm' : 'text-gray-500 hover:bg-gray-50'"
                                class="p-2 rounded-lg transition-all duration-200 flex items-center gap-2 text-sm font-medium px-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path></svg>
                            Board
                        </button>
                    </div>

                    {{-- Add Button --}}
                    <button onclick="openModal('add')" class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-xl shadow-lg transition-colors flex items-center justify-center w-10 h-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </button>
                </div>
            </div>

            {{-- VIEW 1: BOARD (KANBAN) --}}
            <div x-show="viewMode === 'board'" x-transition.opacity class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start h-full">
                
                @foreach([
                    ['title' => 'To Do', 'status_key' => 'pending', 'tasks' => $todoTasks, 'bg_color' => 'bg-gray-100', 'text_color' => 'text-gray-600'],
                    ['title' => 'In Progress', 'status_key' => 'in_progress', 'tasks' => $progressTasks, 'bg_color' => 'bg-blue-50', 'text_color' => 'text-blue-600'],
                    ['title' => 'Done', 'status_key' => 'completed', 'tasks' => $doneTasks, 'bg_color' => 'bg-green-50', 'text_color' => 'text-green-600']
                ] as $col)
                
                <div class="flex flex-col h-full">
                    {{-- Column Header --}}
                    <div class="flex items-center justify-between mb-4 px-1">
                        <h3 class="font-bold text-gray-700 flex items-center gap-2">
                            {{ $col['title'] }} 
                            <span class="{{ $col['bg_color'] }} {{ $col['text_color'] }} text-xs py-0.5 px-2 rounded-full font-bold count-badge">
                                {{ $col['tasks']->count() }}
                            </span>
                        </h3>
                    </div>

                    {{-- Sortable Area (Drop Zone) --}}
                    {{-- Penting: data-status harus sesuai dengan enum di database --}}
                    <div id="board-{{ $col['status_key'] }}" 
                         data-status="{{ $col['status_key'] }}" 
                         class="kanban-col space-y-4 min-h-[150px] pb-10">
                        
                        @foreach($col['tasks'] as $task)
                            @php
                                // Logic Warna Visual Kategori
                                $catColor = match(strtolower($task->category)) {
                                    'work', 'ui' => 'bg-purple-100 text-purple-700',
                                    'health' => 'bg-green-100 text-green-700',
                                    'urgent' => 'bg-red-100 text-red-700',
                                    default => 'bg-blue-100 text-blue-700'
                                };
                                $isDone = $task->status == 'completed';
                            @endphp

                            {{-- Task Card --}}
                            <div class="task-card bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-grab active:cursor-grabbing relative group"
                                 data-id="{{ $task->id }}">
                                
                                <div class="flex justify-between items-start mb-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-bold {{ $catColor }}">
                                        {{ $task->category ?? 'General' }}
                                    </span>
                                    {{-- Edit Button (Hidden until hover) --}}
                                    <button onclick="openModal('edit', {{ json_encode($task) }})" class="text-gray-300 hover:text-gray-500 opacity-0 group-hover:opacity-100 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                    </button>
                                </div>

                                <h4 class="text-gray-900 font-bold mb-2 {{ $isDone ? 'line-through text-gray-400' : '' }}">
                                    {{ $task->title }}
                                </h4>
                                <p class="text-gray-500 text-sm mb-4 line-clamp-2 select-none">{{ $task->description }}</p>

                                <div class="flex items-center justify-between pt-2 border-t border-gray-50">
                                    <div class="flex items-center text-xs text-gray-400 gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ \Carbon\Carbon::parse($task->date)->format('M d, Y') }}
                                    </div>
                                    
                                    {{-- Avatar Placeholder --}}
                                    <div class="flex -space-x-2">
                                         <img class="w-6 h-6 rounded-full border-2 border-white pointer-events-none" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            {{-- VIEW 2: LIST --}}
            <div x-show="viewMode === 'list'" x-cloak class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="grid grid-cols-12 gap-4 p-4 border-b border-gray-100 bg-gray-50 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <div class="col-span-5">Task</div>
                    <div class="col-span-2">Due Date</div>
                    <div class="col-span-2">Category</div>
                    <div class="col-span-2">Status</div>
                    <div class="col-span-1 text-right">Action</div>
                </div>

                @foreach(['To Do' => $todoTasks, 'In Progress' => $progressTasks, 'Done' => $doneTasks] as $groupName => $groupTasks)
                    @if($groupTasks->count() > 0)
                        <div class="bg-gray-50 px-4 py-2 text-sm font-bold text-gray-700 border-b border-gray-100">
                            {{ $groupName }}
                        </div>
                        <div class="divide-y divide-gray-100">
                            @foreach($groupTasks as $task)
                                <div class="grid grid-cols-12 gap-4 p-4 items-center hover:bg-gray-50 transition group">
                                    <div class="col-span-5 flex items-center gap-3">
                                        {{-- Toggle Status Checkbox form --}}
                                        <form action="{{ route('tasknotes.update', $task->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="toggle_status" value="1">
                                            <button type="submit" class="w-5 h-5 rounded border {{ $task->status == 'completed' ? 'bg-blue-500 border-blue-500 text-white' : 'border-gray-300 text-transparent hover:border-blue-500' }} flex items-center justify-center transition">
                                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </button>
                                        </form>
                                        <span class="font-medium text-gray-900 {{ $task->status == 'completed' ? 'line-through text-gray-400' : '' }}">{{ $task->title }}</span>
                                    </div>

                                    <div class="col-span-2 text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($task->date)->format('M d, Y') }}
                                    </div>

                                    <div class="col-span-2">
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-600">
                                            {{ $task->category ?? 'General' }}
                                        </span>
                                    </div>
                                    
                                    <div class="col-span-2">
                                         @if($task->status == 'pending')
                                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">To Do</span>
                                         @elseif($task->status == 'in_progress')
                                            <span class="text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded">In Progress</span>
                                         @else
                                            <span class="text-xs text-green-600 bg-green-50 px-2 py-1 rounded">Done</span>
                                         @endif
                                    </div>

                                    <div class="col-span-1 flex justify-end gap-2">
                                        <button onclick="openModal('edit', {{ json_encode($task) }})" class="text-gray-400 hover:text-blue-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>
                                        <form action="{{ route('tasknotes.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Delete this task?')" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-gray-400 hover:text-red-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>

    {{-- MODAL FORM --}}
    <div id="taskModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="flex justify-between items-center mb-5">
                            <h3 class="text-xl font-bold text-gray-900" id="modalTitle">New Task</h3>
                            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                        </div>
                        
                        <form id="taskForm" action="{{ route('tasknotes.store') }}" method="POST">
                            @csrf
                            <div id="methodField"></div>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                    <input type="text" name="title" id="title" required class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="What needs to be done?">
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
                                        <input type="date" name="date" id="date" required class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                        <select name="status" id="status" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm custom-select">
                                            <option value="pending">To Do</option>
                                            <option value="in_progress">In Progress</option>
                                            <option value="completed">Done</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                    <input type="text" name="category" id="category" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="e.g. Work, Health">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea name="description" id="description" rows="3" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Add details..."></textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Collaborators</label>
                                    <input type="text" name="collaborators" id="collaborators" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Optional">
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end gap-3">
                                <button type="button" onclick="closeModal()" class="rounded-xl border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">Cancel</button>
                                <button type="submit" class="rounded-xl border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script>
        // 1. MODAL LOGIC
        function openModal(mode, task = null) {
            const modal = document.getElementById('taskModal');
            const form = document.getElementById('taskForm');
            const title = document.getElementById('modalTitle');
            const methodField = document.getElementById('methodField');
            
            modal.classList.remove('hidden');
            
            if (mode === 'edit' && task) {
                title.textContent = 'Edit Task';
                form.action = `/tasknotes/${task.id}`;
                methodField.innerHTML = '@method("PUT")';
                
                document.getElementById('title').value = task.title;
                document.getElementById('category').value = task.category;
                document.getElementById('date').value = task.date;
                document.getElementById('description').value = task.description;
                document.getElementById('collaborators').value = task.collaborators;
                // Safely set status if element exists
                const statusEl = document.getElementById('status');
                if(statusEl) statusEl.value = task.status;

            } else {
                title.textContent = 'Add New Task';
                form.action = "{{ route('tasknotes.store') }}";
                methodField.innerHTML = '';
                form.reset();
                document.getElementById('date').valueAsDate = new Date();
                document.getElementById('status').value = 'pending';
            }
        }

        function closeModal() {
            document.getElementById('taskModal').classList.add('hidden');
        }

        // 2. DRAG AND DROP LOGIC (SORTABLE JS)
        document.addEventListener('DOMContentLoaded', function () {
            const columns = document.querySelectorAll('.kanban-col');

            columns.forEach(column => {
                new Sortable(column, {
                    group: 'shared', // Allow dragging between columns
                    animation: 150,
                    ghostClass: 'sortable-ghost', 
                    dragClass: 'sortable-drag',
                    delay: 100, 
                    delayOnTouchOnly: true,
                    
                    onEnd: function (evt) {
                        const itemEl = evt.item;
                        const newColumn = evt.to;
                        const oldColumn = evt.from;

                        // Jika kolom tidak berubah, hentikan
                        if (newColumn === oldColumn) return;

                        const taskId = itemEl.getAttribute('data-id');
                        const newStatus = newColumn.getAttribute('data-status');

                        // Panggil AJAX Update
                        updateTaskStatus(taskId, newStatus);
                        
                        // Update visual badge
                        updateBadgeCount(oldColumn);
                        updateBadgeCount(newColumn);
                    }
                });
            });
        });

        function updateTaskStatus(taskId, status) {
            fetch(`/tasknotes/${taskId}`, {
                method: 'POST', 
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json', // PENTING: Minta balasan JSON
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    _method: 'PUT',
                    status: status
                })
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => { throw new Error(text) });
                }
                return response.json();
            })
            .then(data => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Status updated'
                });
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error', 'Gagal menyimpan perubahan. Cek Console.', 'error');
                // Optional: Reload halaman jika gagal agar posisi kartu kembali
                setTimeout(() => location.reload(), 1500); 
            });
        }

        function updateBadgeCount(column) {
            const container = column.parentElement; 
            const badge = container.querySelector('.count-badge');
            if(badge) {
                const count = column.querySelectorAll('.task-card').length;
                badge.textContent = count;
            }
        }
    </script>
</x-app-layout>