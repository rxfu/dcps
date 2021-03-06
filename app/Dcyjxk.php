<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 大创项目一级学科
 *
 * @author FuRongxin
 * @date 2018-02-14
 * @version 2.3
 */
class Dcyjxk extends Model {

	protected $table = 'dc_yjxk';

	protected $primaryKey = 'dm';

	public $incrementing = false;

	public $timestamps = false;

	/**
	 * 项目信息
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function projects() {
		return $this->hasMany('App\Dcxmxx', 'yjxk_dm', 'dm');
	}
}
