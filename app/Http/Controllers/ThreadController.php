<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index(int $id): View
    {
        $thread = Thread::with(['user', 'topics', 'topics.replies'])
            ->where('id', $id)
            ->first();
        return view('thread.index', compact('thread'));
    }
}
