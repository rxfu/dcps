<?php

namespace App;

use App\DeanModel;

/**
 * 职称
 *
 * @author FuRongxin
 * @date 2016-02-16
 * @version 2.0
 */
class Position extends DeanModel {

	protected $table = 'zd_zc';

	protected $primaryKey = 'dm';

	public $incrementing = false;

	public $timestamps = false;

	/**
	 * 教师信息
	 * @author FuRongxin
	 * @date    2016-02-16
	 * @version 2.0
	 * @return  object 所属对象
	 */
	public function teachers() {
		return $this->hasMany('App\Teacher', 'zc', 'dm');
	}
}
