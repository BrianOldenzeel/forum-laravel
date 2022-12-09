@extends('layouts.main')

@section('pagetitle')

@endsection

@section('content')
    <div class="row first-row">

        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">{{ $thread->title }} - Topics</span>

                    <div class="collection">

                        @foreach($thread->topics as $topic)
                        <!-- BEGIN TOPIC -->
                        <a href="topic.html" class="collection-item avatar collection-link">
                            <img src="http://www.gravatar.com/avatar/fc7d81525f7040b7e34b073f0218084d?s=50" alt="" class="square">

                            <div class="row">

                                <div class="col s8">
                                    <div class="row last-row">
                                        <div class="col s12">
                                            <span class="title">{{ $topic->title }}</span>
                                            <p>{{ $topic->content }}</p>
                                        </div>
                                    </div>
                                    <div class="row last-row">
                                        <div class="col s12 post-timestamp">Gepost door: {{$topic->user->name}} op: {{$topic->created_at}}</div>
                                    </div>
                                </div>

                                <div class="col s2">
                                    <h6 class="title center-align">Replies</h6>
                                    <p class="center replies">{{ $topic->replies->count() }}</p>
                                </div>

                                <div class="col s2">
                                    <h6 class="title center-align">Status</h6>
                                    <div class="status-wrapper">
                                        <span class="status-badge status-open">open</span>
                                    </div>
                                </div>

                            </div>
                        </a>
                        <!-- EINDE TOPIC -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

