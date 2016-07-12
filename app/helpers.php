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


	function generateSku(){
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$sku      = mt_rand(10000, 99999) . mt_rand(10000, 99999) . $characters[mt_rand(0, strlen($characters) - 1)];
		return str_shuffle($sku);
	}

	function generatePin(){
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $pin      = mt_rand(10000, 99999) . mt_rand(10000, 99999) . $characters[mt_rand(0, strlen($characters) - 1)];
	    return str_shuffle($pin);
	}


	function generateCoupon(){
		$chars  = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$coupon = "";
		for ($i = 0; $i < 6; $i++) {
			$coupon .= $chars[mt_rand(0, strlen($chars) - 1)];
		}
	}


	
	// public static function getAvatar($id){
	// 	$user = \App\User::find($id);
	// 	$profile = $user->Profile;
	// 	$name = ($user->name) ? : $user->username;
	// 	foreach($user->roles as $role)
	// 		$role_name = $role->display_name;
	// 	$tooltip = ucwords($name).' (Role: '.$role_name.')';
	// 	$tooltip .= (!Entrust::hasRole('user')) ? ' Email: '. $user->email : '';

	// 	if(isset($profile->photo))
	// 		echo '<img src="/assets/user/'.DOMAIN.'/'.$profile->photo.'" class="media-object img-circle" style="width:57px;" alt="User avatar" data-toggle="tooltip" title="'.$tooltip.'">';
	// 	else
	// 		echo '<div class="textAvatar" data-toggle="tooltip" title="'.$tooltip.'">'.$name.'</div>';
	// }


