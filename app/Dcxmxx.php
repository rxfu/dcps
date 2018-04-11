<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 大创项目信息
 *
 * @author FuRongxin
 * @date 2018-02-14
 * @version 2.3
 */
class Dcxmxx extends Model {

	protected $table = 'dc_xmxx';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $casts = [
		'sfsh' => 'boolean',
		'sftg' => 'boolean',
	];

	/**
	 * 项目类别
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function category() {
		return $this->belongsTo('App\Dcxmlb', 'xmlb_dm', 'dm');
	}

	/**
	 * 一级学科
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function subject() {
		return $this->belongsTo('App\Dcyjxk', 'yjxk_dm', 'dm');
	}

	/**
	 * 项目成员
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function members() {
		return $this->hasMany('App\Dcxmcy', 'xm_id', 'id')->orderBy('pm');
	}

	/**
	 * 指导教师
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function tutors() {
		return $this->hasMany('App\Dczdjs', 'xm_id', 'id')->orderBy('pm');
	}

	/**
	 * 本校指导教师
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function bxtutors() {
		return $this->hasMany('App\Dczdjs', 'xm_id', 'id')->whereSfbx(true)->orderBy('pm');
	}

	/**
	 * 外校指导教师
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function wxtutors() {
		return $this->hasMany('App\Dczdjs', 'xm_id', 'id')->whereSfbx(false)->orderBy('pm');
	}

	/**
	 * 项目申报书
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function application() {
		return $this->hasOne('App\Dcxmsq', 'xm_id', 'id');
	}

	/**
	 * 项目经费
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function funds() {
		return $this->hasMany('App\Dcxmjf', 'xm_id', 'id')->orderBy('id');
	}

	/**
	 * 项目负责人
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function student() {
		return $this->belongsTo('App\Profile', 'xh', 'xh');
	}

	/**
	 * 项目评审
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  object 所属对象
	 */
	public function reviews() {
		return $this->hasMany('App\Dcxmps', 'xm_id', 'id')->orderBy('id');
	}
}
