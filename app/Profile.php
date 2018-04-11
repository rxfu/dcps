<?php

namespace App;

use App\DeanModel;

/**
 * 在校生个人资料
 *
 * @author FuRongxin
 * @date 2016-1-12
 * @version 2.0
 */
class Profile extends DeanModel {

	protected $table = 'xs_zxs';

	protected $primaryKey = 'xh';

	public $incrementing = false;

	public $timestamps = false;

	/**
	 * 学院
	 * @author FuRongxin
	 * @date    2016-01-12
	 * @version 2.0
	 * @return  object     所属对象
	 */
	public function college() {
		return $this->belongsTo('App\Department', 'xy', 'dw');
	}
}
