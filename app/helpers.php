<?php
	/**
	 * Created by PhpStorm.
	 * User: Phillip Madsen
	 * Date: 7/11/2016
	 * Time: 3:46 PM
	 */
	function flash($title = null, $message = null)
	{
		$flash = app('App\Http\Flash');
		if (func_num_args() == 0) {
			return $flash;
		}

		return $flash->info($title, $message);
	}