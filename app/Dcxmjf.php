<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 大创项目经费计划
 *
 * @author FuRongxin
 * @date 2018-02-14
 * @version 2.3
 */
class Dcxmjf extends Model {

	protected $table = 'dc_xmjf';

	protected $primaryKey = 'id';

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
		return $this->belongsTo('App\Dcxmxx', 'xm_id', 'id');
	}
}
