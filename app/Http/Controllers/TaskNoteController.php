<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskNote;
use Illuminate\Support\Facades\Auth;

class TaskNoteController extends Controller
{
    public function index(Request $request)
    {
        $query = TaskNote::where('user_id', Auth::id());

        // Basic filtering
        if ($request->has('status') && $request->status != 'All') {
            $query->where('status', $request->status);
        }
        
        // Sorting berdasarkan tanggal terbaru
        $tasks = $query->latest('date')->get();

        $todoTasks = $tasks->where('status', 'pending');
        $progressTasks = $tasks->where('status', 'in_progress'); 
        $doneTasks = $tasks->where('status', 'completed');

        return view('screen.tasknotes', compact('tasks', 'todoTasks', 'progressTasks', 'doneTasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        TaskNote::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'date' => $request->date,
            'description' => $request->description,
            'status' => $request->status, 
            'tags' => $request->tags,
            'collaborators' => $request->collaborators,
        ]);

        return redirect()->back()->with('success', 'Task created successfully.');
    }

    public function update(Request $request, $id)
    {
        $task = TaskNote::where('user_id', Auth::id())->findOrFail($id);

        // --- SKENARIO 1: UPDATE VIA DRAG & DROP (AJAX) ---
        // Kita cek jika request ingin JSON atau hanya mengirim status tanpa title
        if ($request->wantsJson() || ($request->has('status') && !$request->has('title'))) {
            
            $task->status = $request->status;
            $task->save();

            return response()->json([
                'success' => true, 
                'message' => 'Status updated successfully'
            ]);
        }

        // --- SKENARIO 2: UPDATE VIA TOMBOL CHECKLIST DI LIST VIEW ---
        if ($request->has('toggle_status')) {
            $task->status = $task->status === 'completed' ? 'pending' : 'completed';
            $task->save();
            return redirect()->back()->with('success', 'Task status toggled.');
        }

        // --- SKENARIO 3: UPDATE VIA FORM EDIT (MODAL) ---
        // Validasi lengkap hanya dijalankan jika ini edit full form
        $request->validate([
            'title' => 'required|string|max:255',
            'date'  => 'required|date',
        ]);

        $task->update($request->only([
            'title', 'category', 'date', 'description', 'status', 'tags', 'collaborators'
        ]));

        return redirect()->back()->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = TaskNote::where('user_id', Auth::id())->findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully.');
    }
}