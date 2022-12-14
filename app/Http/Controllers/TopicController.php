<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TopicController extends Controller
{
    public function index(int $id): View
    {
        $topic = Topic::with(['user', 'replies', 'replies.user'])
            ->where('id', $id)
            ->first();

        return view('topic.index', compact('topic'));

    }
}
