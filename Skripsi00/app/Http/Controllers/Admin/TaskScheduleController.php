<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaskSchedule;
use Illuminate\Http\Request;

class TaskScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TaskSchedule::get();
        return view('pages.admin.laporan.taskschedule.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.laporan.taskschedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        $task_schedule = new TaskSchedule();
        $task_schedule->title = $request->input('title');
        $task_schedule->start = $request->input('start');
        $task_schedule->end = $request->input('end');
        // Set other task_schedule attributes
        $task_schedule->save();
        return response()->json([
            'success' => 'Added Data Successfully'
        ], 200);
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
        $data_id = TaskSchedule::where('id', $id)->first();
        return view('pages.admin.laporan.taskschedule.edit', compact('data_id'));
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
        $update = TaskSchedule::where('id', $id)->first();

        $update->id = $update->id;
        
        $update->title = $request->get('title');
        $update->start = $request->get('start');
        $update->end = $request->get('end');

        $update->save();

        return redirect()->route('task_schedule.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task_schedule = TaskSchedule::findOrFail($id);
        $task_schedule->delete();
        
        return redirect()->route('task_schedule.index')->with('success', 'Data Updated Successfully');
    }
}
