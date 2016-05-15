<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Reservation;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	public function calendar()
	{
		$reservations = Reservation::all();
		return view('calendar', ['res' => $reservations]);
	}

	public function reserve(Request $request)
	{
		$this->validate($request, [
			'name' 		=> 'required',
			'check_in'	=> 'required|date|after:tomorrow',
			'check_out' => 'required|date|after:tomorrow|after:check-in',
			'room'		=> 'required'
		]);

		$check_in  = Carbon::createFromFormat('m/d/Y', $request->check_in);
		$check_out = Carbon::createFromFormat('m/d/Y', $request->check_out);
		
		$r = new Reservation();
		$r->name = $request->name;
		$r->check_in = $check_in;
		$r->check_out = $check_out;
		$r->room = $request->room;
		$r->save();
		//dd($r);
		return redirect('calendar');
	}

}
