<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $user_id = auth::id();
        $name = auth::user()->name;
        $tasks = Task::with('user')->where('user_id', $user_id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('tasks.index', compact('tasks', 'name'));
    }
    public function create()
    {
        return view('tasks.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'long_description' => 'required',
        ]);
        $validatedData['user_id'] = auth::id();
        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Thêm nhiệm vụ thành công.');
    }
    public function show(string $id)
    {
        $task = Task::find($id);
        return view('tasks.detail', compact('task'));
    }
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view('tasks.update', compact('task'));
    }
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'long_description' => 'required',
        ]);
        $task = Task::find($id);
        $task->update($validatedData);
        return redirect()->route('tasks.index')->with('success', 'Cập nhật nhiệm vụ thành công.');
    }
    public function destroy(string $id)
    {
        Task::destroy($id);
        return redirect()->route('tasks.index')->with('success', 'Xóa nhiệm vụ thành công.');
    }
    public function updatecompleted(string $id)
    {
        $task = Task::find($id);
        $task->completed = !$task->completed;
        $task->save();
        return redirect()->route('tasks.show', $id)->with('success', 'Cập nhật trạng thái nhiệm vụ thành công.');
    }
    public function findcompleted(string $completed)
    {
        $user_id = auth::id();
        $name = auth::user()->name;
        $tasks = Task::with('user')->where('user_id', $user_id)->where('completed', $completed)->orderBy('updated_at', 'desc')->paginate(10);
        return view('tasks.index', compact('tasks', 'name'));
    }
}
