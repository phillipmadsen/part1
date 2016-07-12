<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

	/**
	 * User constructor.
	 *
	 * @param string $table
	 */
	public function __construct()
	{
		$this->user = Auth::user();
		view()->share('singedIn', Auth::check());
		view()->share('user', $this->user);
	}

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

	public function owns($relation)
	{
		return $relation->user_id == $this->id;
	}

	/**
	 * Relationship with the product model.
	 *
	 * @author	Phillip Madsen
	 * @return	\Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function products()
	{
		return $this->hasMany(Product::class);
	}


	public function publish(Product $product)
	{
		$this->products()->save($product);
	}
}
