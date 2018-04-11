<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username', 'password', 'role',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public $table = 'dc_user';

	/**
	 * 获取remember token
	 * @author FuRongxin
	 * @date    2018-02-12
	 * @version 2.3
	 * @return  null
	 */
	public function getRememberToken() {
		return null;
	}

	/**
	 * 设置remember token
	 * @author FuRongxin
	 * @date    2018-02-12
	 * @version 2.3
	 * @param   string $value token值
	 */
	public function setRememberToken($value) {

	}

	/**
	 * 获取remember token名
	 * @author FuRongxin
	 * @date    2018-02-12
	 * @version 2.3
	 * @return  null
	 */
	public function getRememberTokenName() {
		return null;
	}

	/**
	 * 覆盖原方法，忽略remember token
	 * @author FuRongxin
	 * @date    2018-02-12
	 * @version 2.3
	 */
	public function setAttribute($key, $value) {
		if ($key != $this->getRememberTokenName()) {
			parent::setAttribute($key, $value);
		}
	}
}
