<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;

class ToDoListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = ToDoList::all();
        return view('index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = ToDoList::create(['title' => $request->title,'content' => $request->content]);
        $todos = ToDoList::all();
        return view('index',compact('todos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = ToDoList::findOrFail($id);
        return view('show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = ToDoList::findOrFail($id);
        return view('edit', compact('todo'));
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
        $todo = ToDoList::findOrFail($id);
        if ($request->done === 'true'){
            $todo->done = true;
            $todo->save();
            $todos = ToDoList::all();
            return view('index',compact('todos'));
        }
        $todo->title = $request->title;
        $todo->content = $request->content;
        $todo->save();
        $todos = ToDoList::all();
        return view('index',compact('todos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = ToDoList::findOrFail($id);
        $todo->delete();
        $todos = ToDoList::all();
        return view('index',compact('todos'));
    }
}
