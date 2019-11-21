<?php defined('BASEPATH') OR exit('No direct script access allowed');

function first_char_of_every_word($string)
{
	if(str_word_count($string) > 1)
	{
		$arr = explode(' ', $string);
			$group_suffix =  strtolower($arr[0][0].$arr[1][0]);
	}
	else
	{
		$group_suffix =  strtolower($string[0]);
	}

	return $group_suffix;
}

function replace_space_with_underscore($string)
{
	if(str_word_count($string) > 1 )
	{
		$furnish_item = str_replace(' ', '_', strtolower(trim($string)));
	}
	else
	{
		$furnish_item = strtolower(trim($string));
	}

	return $furnish_item;
}

?>