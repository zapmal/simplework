<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/*
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/*
	 * The attributes that are mass assignable.
	 * 
	 * @var array
	*/
	protected $fillable = array("name", "email", "password");

	/*
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/*
	 * The attributes that should be cast to native types.
	 * 
	 * @var array 
	 */
	protected $casts = array("email_verified_at" => "datetime");
	   
    public static $rules = array(
        "name" => "required|min:2",
        "email" => "required|email|unique:users",
        "password" => "required_with:password_confirmation|min:6",
        "password_confirmation" => "min:6|same:password"
	);

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function articles() {
		return $this->hasMany(Article::class);
	}

	public function projects() {
		return $this->hasMany(Project::class);
	}
}
