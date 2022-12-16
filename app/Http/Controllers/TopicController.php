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
}
