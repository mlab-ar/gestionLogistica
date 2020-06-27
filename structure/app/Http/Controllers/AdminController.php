<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Blog;
use App\Evento;
use App\Mail\CourseApproved;
use App\Mail\CourseRejected;
use App\VueTables\EloquentVueTables;
use Illuminate\Http\Request;

class AdminController extends Controller
{

	public function index()
	{
		$blog = Blog::where('id','=','1')->get();
		$evento=Evento::where('estado','PRINCIPAL')->first();
		$eventos=Evento::where('estado','PRINCIPAL')->get();
		$pendientes=Persona::where('estado','PENDIENTE')->get();
		$inscriptos=Persona::where('estado','PRE-INSCRIPTO')->get();
		$rechazados=Persona::where('estado','RECHAZADO')->get();
        return view("admin.dashboard", compact('blog','evento','eventos','pendientes','inscriptos','rechazados'));
	}

	public function courses () {
		return view('admin.courses');
	}

	public function coursesJson () {
		if(request()->ajax()) {
			$vueTables = new EloquentVueTables;
			$data = $vueTables->get(new Course, ['id', 'name', 'status'], ['reviews']);
			return response()->json($data);
		}
		return abort(401);
	}

	public function updateCourseStatus () {
		if (\request()->ajax()) {
			$course = Course::find(\request('courseId'));

			if(
				(int) $course->status !== Course::PUBLISHED &&
				! $course->previous_approved &&
				\request('status') === Course::PUBLISHED
			) {
				$course->previous_approved = true;
				\Mail::to($course->teacher->user)->send(new CourseApproved($course));
			}

			if(
				(int) $course->status !== Course::REJECTED &&
				! $course->previous_rejected &&
				\request('status') === Course::REJECTED
			) {
				$course->previous_rejected = true;
				\Mail::to($course->teacher->user)->send(new CourseRejected($course));
			}

			$course->status = \request('status');
			$course->save();
			return response()->json(['msg' => 'ok']);
		}
		return abort(401);
	}

	public function students () {
		return view('admin.students');
	}

	public function teachers () {
		return view('admin.teachers');
	}
}
