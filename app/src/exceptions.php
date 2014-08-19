<?php

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});


App::error(function(Soluciones\Exceptions\UnredeemableBenefitException $exception, $code){
	return \Response::json([
		'status'        => 'Not Found',
		'response_code' => 404
	], 404);
});



App::error(function(Soluciones\Exceptions\InvalidPrintRequest $exception, $code)
{
	return Redirect::route('benefits.index')
	               ->with('error', 'No puedes imprimir un benefico que no tengas guardado.');
});



App::error(function(Symfony\Component\HttpKernel\Exception\NotFoundHttpException $exception, $code)
{
	if ( ! Config::get('app.debug') ) return View::make('404');
});


/*
|--------------------------------------------------------------------------
| Form Validation Exceptions
|--------------------------------------------------------------------------
*/

App::error(function(Soluciones\Exceptions\FormValidationException $exception, $code)
{
	return Redirect::back()->withInput()->withErrors($exception->getErrors());
});
