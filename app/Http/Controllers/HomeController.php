<?php

namespace App\Http\Controllers;

use App\Dcxmps;
use App\Dcxmxx;
use App\Profile;
use Auth;
use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if ('xx' === Auth::user()->role) {
			$projects = Dcxmxx::has('application')
				->with('category', 'subject', 'student')
				->orderBy('id')
				->get();
		} elseif ('xy' === Auth::user()->role) {
			$students = Profile::whereXy(Auth::user()->szxy)->pluck('xh');
			$projects = Dcxmxx::has('application')
				->with('category', 'subject', 'student')
				->whereIn('xh', $students)
				->orderBy('id')
				->get();
		}

		return view('home', compact('projects'));
	}

	/**
	 * 显示PDF申报书
	 * @author FuRongxin
	 * @date    2018-02-14
	 * @version 2.3
	 * @return  \Illuminate\Http\Response PDF申报书
	 */
	public function getPdf($id) {
		$project = Dcxmxx::with('student', 'application', 'funds')->findOrFail($id);
		$title   = '广西高校大学生创新创业计划项目申报书';

		return PDF::loadView('pdf', compact('title', 'project'))
			->setPaper('a4')
			->setOption('margin-top', '3.7cm')
			->setOption('margin-bottom', '3.5cm')
			->setOption('margin-left', '2.8cm')
			->setOption('margin-right', '2.6cm')
			->inline($project->student->xh . '.pdf');
	}

	public function review($id) {
		$project = Dcxmxx::findOrFail($id);
		$review  = Dcxmps::whereXmId($project->id)
			->whereUserId(Auth::user()->id)
			->first();

		return view('review', compact('project', 'review'));
	}

	public function postReview(Request $request, $id) {
		if ($request->isMethod('post')) {
			$this->validate($request, [
				'pf' => 'required|numeric',
			]);

			$exists = Dcxmps::whereXmId($id)
				->whereUserId(Auth::user()->id)
				->exists();

			if ($exists) {
				$review = Dcxmps::whereXmId($id)
					->whereUserId(Auth::user()->id)
					->first();
				$review->psyj = $request->psyj;
				$review->pf   = $request->pf;
			} else {
				$review          = new Dcxmps;
				$review->xm_id   = $id;
				$review->psyj    = $request->psyj;
				$review->pf      = $request->pf;
				$review->user_id = Auth::user()->id;
			}

			if ($review->save()) {
				$request->session()->flash('success', '评审意见填写成功');
			} else {
				$request->session()->flash('danger', '评审意见填写失败');
			}

			return redirect()->route('home');
		}
	}

}
