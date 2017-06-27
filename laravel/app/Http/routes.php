<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
    Route::get('/', function () {
        return view('tasks', [
            'tasks' => Task::orderBy('updated_at', 'DESC')->get()
        ]);
    });

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

        return redirect('/');
    });

    /**
     * Delete Task
     */
    Route::delete('/task/delete/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    });

    /**
     * Edit Task
     */
    Route::get('/task/edit/{id}', function ($id) {
        return view('tasks.editTask', [
            'task' => Task::find($id)
        ]);
    });

    /**
     * Update Task
     */
    Route::post('/task/update/{id}', function ($id) {

        $task = Task::findOrFail($id);
        $task->name = Input::get('name');
        $task->description = Input::get('description');
        $task->save();

        return redirect('/');
    });
});
