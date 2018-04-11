<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dcxmps extends Model {

	protected $table = 'dc_xmps';

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
	public function project() {
		return $this->belongsTo('App\Dcxmxx', 'xm_id', 'id');
	}

}
