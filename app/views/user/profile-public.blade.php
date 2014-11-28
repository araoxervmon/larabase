@extends('layouts.master')
@section('content')

<h1>{{ $user->full_name or $user->username }}</h1>

<hr>

<div class="row">
    <div class="col-md-6">
        <br>
        <div class="media">
            <img src="{{ gravatar_url($user->email, 160) }}" alt="{{ $user->username }}" class="media-object pull-left">
            <div class="media-body">
                <h3 class="media-heading">{{ $user->username }}</h3>
                <h4><i class="fa fa-map-marker"></i> City, Country</h4>
                <p><strong>About me: </strong>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo,
                tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <h3>Posts <span class="badge">{{ count($posts) }} </span></h3>
        <div class="list-group">
            @forelse($posts as $post)
                <a href="{{ URL::to('posts/' . $post->id) }}" class="list-group-item">{{ $post->title }}</a>
            @empty
                <p class="text-muted">{{ $user->username }} has not published any posts yet</p>
            @endforelse
        </div>
    </div>
</div>

@stop
