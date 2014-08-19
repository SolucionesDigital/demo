<?php

function is_home()
{
	return Request::is('/');
}

/**
 * Regresa active dependiendo si el path conicide.
 *
 * @param $pattern
 * @return string
 */
function set_active($pattern)
{
	return Request::is($pattern) ? 'active' : '';
}


/**
 * @param        $array
 *
 * @return array
 */
function array_flat($array)
{
	$result = [];

	foreach ($array as $key => $value)
	{
		if ( is_array($value) )
		{
			$result = array_merge( $result, array_flat($value) );
		}
		else
		{
			$result[ $key ] = $value;
		}
	}

	return $result;
}

/**
 *
 *
 * @param string $routeName
 * @param string $title
 * @param string $parameters
 * @param array  $attributes
 */
function link_to_delete($routeName, $title, $parameters, $attributes = [])
{
	echo Form::open(['route' => [$routeName, $parameters], 'method' => 'DELETE', 'class'=>'plain-buttons']);
	echo Form::submit($title, $attributes);
	echo Form::close();
}


/**
 * @param $category_id
 * @param $benefit
 *
 * @return bool
 */
function is_category_checked($category_id, $benefit)
{
	if ( is_null($benefit) ) return false;

	$benefitCategories = @ $benefit->categories->lists('id');

	return in_array($category_id, $benefitCategories);
}
