<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 大创项目类别
 *
 * @author FuRongxin
 * @date 2018-02-14
 * @version 2.3
 */
class Dcxmlb extends Model {

	protected $table = 'dc_xmlb';

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
		return $this->hasMany('App\Dcxmxx', 'xmlb_dm', 'dm');
	}
}
