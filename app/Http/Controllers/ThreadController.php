<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;

class ThreadController extends Controller
{
    public function index( int $id): View
    {
        $thread = Thread::with(['user', 'topics', 'topics.replies'])
            ->where('id', $id)
            ->first();

        return view('thread.index', compact('thread'));

    }
}
