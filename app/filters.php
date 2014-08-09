<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    if(Auth::check())
    {
        $user = Auth::user();
        // Log last User Activity
        Event::fire('last.activity', array($user));
        // Share User's Timezone across all views
        View::share('user_timezone', $user->timezone);
    }
    else {
        // Share Default Timezone across all views
        View::share('user_timezone', 'UTC');
    }

});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
        return Redirect::guest('login')->withInfo(Lang::get('larabase.only_auth'));
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check())
        return Redirect::to('dashboard')->withInfo(Lang::get('larabase.only_guest'));
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


/*
|--------------------------------------------------------------------------
| LaraBase Filters
|--------------------------------------------------------------------------
|
*/

Route::filter('admin', function()
{
    if ( Auth::user()->id !== 1 )
    {
        return Redirect::to('dashboard')->withWarning(Lang::get('larabase.only_admin'));
    }
});


Route::filter('owner', function()
{
    $resource_id = Request::segment(2);
    $resource = Request::segment(1);
    $resource_singular = ucwords(str_singular($resource));
    $object = $resource_singular::whereId($resource_id)->first();
    if(Auth::user()->id !== $object->user_id && Auth::user()->id !== 1 )
    {
     return Redirect::back()->withWarning(Lang::get('larabase.only_owner', ['resource_singular'=> $resource_singular]));
    }
});

