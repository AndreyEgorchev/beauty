<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

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
	protected $fillable = ['name', 'email', 'password','id_specialist','first_name','last_name','phone'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	public function theroles()
	{
		return $this->belongsToMany('App\Role', 'role_users', 'user_id', 'role_id');
	}

	public function setTherolesAttribute($roles)
	{
		$this->theroles()->detach();
		if ( ! $roles)
			return;
		if ( ! $this->exists)
			$this->save();
		$this->theroles()->attach($roles);
	}

	public function getTherolesAttribute($roles)
	{
		return array_pluck($this->theroles()->get(['id'])->toArray(), 'id');
	}



	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}
}
