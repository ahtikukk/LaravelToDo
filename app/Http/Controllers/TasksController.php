<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pärime taskide andmed andmebaasist
        //$tasks = Task::all();
        $tasks = Task::orderBy('due_date','asc')->paginate(2);
        // kuvame lehe
        return view('tasks.index')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //kuvab taskide sisestusvormi
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // valideeri andmed
        $this->validate($request,[
            'name' => 'required|string|max:191|min:3',
            'description' => 'required|string|max:10000|min:10',
            'due_date' => 'required|date'
         ]);
        //loo uus task objekt
        $task = new Task;
        //salvesta vormilt saadud andmed objekti
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        //salvesta objekt andmebaasi
        $task->save();
        //näita rõõmusõnumit
        Session::flash('success', 'Task created successfully');
        //saada tagasi nimekirja
        return redirect()->route('task.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // otsime üles õige taski
        $task = Task::find($id);
        $task->dueDateFormatting = false;

        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         // valideeri andmed
         $this->validate($request,[
            'name' => 'required|string|max:191|min:3',
            'description' => 'required|string|max:10000|min:10',
            'due_date' => 'required|date'
         ]);
        //leia õige task objekt
        $task = Task::find($id);

        //salvesta vormilt saadud andmed objekti
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        //salvesta objekt andmebaasi
        $task->save();
        //näita rõõmusõnumit
        Session::flash('success', 'Task saved successfully');
        //saada tagasi nimekirja
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // otsime üles õige taski
         $task = Task::find($id);

         // kustuta task
         $task->delete();

         //näita rõõmusõnumit
         Session::flash('success', 'Task delited successfully');

         //saada tagasi nimekirja
         return redirect()->route('task.index');
    }
}
