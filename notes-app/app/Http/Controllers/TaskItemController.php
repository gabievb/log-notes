<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskItem;

class TaskItemController extends Controller
{
    public function store(Request $request, TaskItem $taskItem)
    {
        $validated = $request->validate([
            'content' => 'required|min:1|max:300',
            'task_id' => 'required|exists:tasks,id',
            'is_marked' => 'required|integer|between:1,2'
        ]);

        try{
            $taskItem = $taskItem->fill($validated);
            $taskItem->save();

            return redirect()->route('dashboard');
        } catch(\Exception $ex) {
            //$ex->getMessage();
            return "Ocorreu algum problema ao realizar a inserção!";
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:300',
            'is_marked' => 'required|integer|between:1,2',
            'task_item_id' => 'required|exists:task_items,id'
        ]);

        TaskItem::findOrFail($request->task_item_id)->update([
            'content' => $request->input('content'),
            'is_marked' => $request->input('is_marked')
        ]);

        return redirect()->route('dashboard')->with('status', 'Item atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $taskItem = TaskItem::findOrFail($id);
        $taskItem->delete();

        // Retorna resposta JSON para o AJAX
        return response()->json(['success' => true]);
    }
}

