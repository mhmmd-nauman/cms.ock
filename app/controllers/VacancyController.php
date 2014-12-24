<?php

class VacancyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            //echo "its here";
		// get all the nerds
		$vacancy = Vacancy::all();
                $vacancies = DB::table('vacancies')->paginate(15);
                //echo "<pre>";
                //print_r($nerds);
                //echo "</pre>";
		// load the view and pass the nerds
		return View::make('admin.career_online_applicants_edit')
			->with('online_Applications', $vacancy)
                        ->with('pagination', $vacancies)
                ;
	}

	
	public function destroy($id)
	{
		// delete
		$vacancy = Vacancy::find($id);
		$vacancy->delete();

		// redirect
		Session::flash('message', 'The information has been deleted successfully!');
		return Redirect::to('careers_online_applicants_list');
	}

}