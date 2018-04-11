<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 大创项目成员
 *
 * @author FuRongxin
 * @date 2018-02-14
 * @version 2.3
 */
class Dcxmcy extends Model {

	protected $table = 'dc_xmcy';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $casts = [
		'sfbx' => 'boolean',
	];

	/**
	 * 项目信息
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function project() {
		return $this->belongsTo('App\Dcxmxx', 'xm_id', 'id');
	}

	/**
	 * 学生资料
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function profile() {
		return $this->belongsTo('App\Profile', 'xh', 'xh');
	}
}
