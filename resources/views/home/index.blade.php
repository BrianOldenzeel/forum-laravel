@extends('layouts.main')

@section('pagetitle')
    Home
@endsection

@section('content')
    <div class="row first-row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Threads</span>
                    <div class="collection">
                        @foreach($threads as $thread)
                        <!-- BEGIN VAN EEN THREAD -->
                        <a href="{{route('thread.index', ['id' => $thread->id])}}" class="collection-item avatar collection-link">
                            <img src="{{ asset('img/icon-php.png')}}" alt="" class="circle">
                            <div class="row">
                                <div class="col s9">
                                    <div class="row last-row">
                                        <div class="col s12">
                                            <span class="title">
                                                {{ $thread->title }}
                                            </span>
                                            <p>
                                                {{ $thread->description}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row last-row">
                                        <div class="col s12 post-timestamp">
                                            Moderator {{ $thread->user->name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col s3">
                                    <h6 class="title center-align">Statistieken</h6>
                                    <p class="center-align">
                                        {{$thread->topics_count}} Topics
                                    </p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @auth
        <div class="card">
            <div class="card-content">
                <form method="POST" action="{{route('Thread.store', ['id' => $thread->id])}}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s6 has-error">
                            <input id="title" type="text" name="title" placeholder="Tik hier een titel voor het onderwerp in">
                            <label for="title" class="active">Titel van de Thread</label>
                            <span>Titel is verplicht!</span>
{{--                            <input id="title" type="hidden" name="user_id" value="{{auth()->user()->id}}">--}}
                        </div>
                    </div>
                    <div class="row">
                        <span>Beschrijving</span>
                        <div class="col s12">
                            <textarea id="message-body" name="description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 push-s6">
                            <button type="submit" class="btn right cyan darken-1">
                                Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endauth
@endsection
