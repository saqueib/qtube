@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Latest Videos</div>

                <div class="panel-body">
                    @if(Auth::user()->videos()->count())

                        <video-thumb :list="{{ Auth::user()->videos()->with(['channel', 'category'])->limit(4)->latest()->get() }}"></video-thumb>
                    @else
                        <p class="text-center">You don't have any video uploaded yet.</p>
                    @endif
                </div>
            </div>

            <h4>OAuth Management</h4>

            <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>

        <div class="col-md-2">
            <div class="text-center mt">
                <img class="img-circle" src="{{ Auth::user()->avatar  }}" alt="{{ Auth::user()->name }}">
                <h4>{{ Auth::user()->name }} <br>
                <small>{{ Auth::user()->email  }}</small></h4>
                <p><span class="glyphicon glyphicon-calendar"></span> Joined {{ Auth::user()->created_at->toFormattedDateString() }}</p>
                <p><span class="glyphicon glyphicon-facetime-video"></span> {{ Auth::user()->videos()->count() . ' ' . str_plural('Video', Auth::user()->videos()->count()) }}</p>
                <p><span class="glyphicon glyphicon-comment"></span> {{ Auth::user()->comments()->count() . ' ' . str_plural('Comment', Auth::user()->videos()->count()) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
