<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:1|max:200'
        ]);

        try{
            $task = $task->fill($validated);
            $task->user_id = Auth::user()->id;
            $task->save();

            return redirect()->route('dashboard')->with('status', 'Task criada com sucesso!');

        } catch(\Exception $e){
            return back()->withErrors(['error' => 'Ocorreu um erro ao criar a task. Por favor, tente novamente.'])->withInput();
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'task_id' => 'required|exists:tasks,id'
        ]);

        Task::findOrFail($request->task_id)->update([
            'title' => $request->title
        ]);

        return redirect()->route('dashboard')->with('status', 'Tarefa atualizada com sucesso!');
    }

    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->taskItems()->delete();
        $task->delete();

        return redirect()->route('dashboard')->with('status', 'Tarefa removida com sucesso!');
    }
}
