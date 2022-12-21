<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TopicController extends Controller
{
    public function index(Topic $topic): View
    {
        $topic->load(['user', 'replies', 'replies.user']);

        return view('topic.index', compact('topic'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
//        $request->validate([
//            'title' => 'required ' ,
//            'content' => 'required' ,
//            'thread_id' => 'required | exists:threads,id' ,
//            'user_id' => 'required | exists:users,id' ,
//
//        ]);
//
//        Topic::create(
//            $request->only(
//                ['title', 'content', 'thread_id', 'user_id']
//            )
//        );

        $validateData = $request->validate([
            'content' => 'required',
            'title' => 'required'
        ]);

        Topic::create(
            $validateData + [
                'thread_id' => $id,

                'user_id' => auth()->id()
            ]
        );


        return redirect()->back();
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
