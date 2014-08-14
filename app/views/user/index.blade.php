@extends('layouts.master')
@section('content')

<h1>Users</h1>

<hr>

@foreach($users as $user)
         <h3>{{ $user->full_name }} {{ link_to("/users/{$user->username}", $user->username) }} <small>last seen {{$user->updated_at->diffForHumans() }}</small></h3>
@endforeach

{{ $users->links() }}

@stop