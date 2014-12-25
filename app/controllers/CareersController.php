<?php

class CareersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
           
		// get all the nerds
		$careers = Career::all();
                //echo "<pre>";
                //print_r($nerds);
                //echo "</pre>";
		// load the view and pass the nerds
		return View::make('admin.career_vac_edit')
			->with('careers', $careers);
                        
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/nerds/create.blade.php)
                         $careers = Career::all();
		return View::make('admin.add_vacancy')
                        ->with('careers', $careers)
                        ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
           
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'status'           => '',
			'jobtitle'         => '',
			'date'             => '',
                        'responsibilities' => '',
                        'requirements'     => '',
                        'footertext'     => ''
		);
                
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
                     Session::flash('error_message', 'The information has been Not saved successfully/ Please try again');
			return Redirect::to('career_vac_edit')
				->withErrors($validator);
				
		} else {
                    
			// store
			$career = new Career;
			$career->jobtitle       = Input::get('job_title');
			$career->status      = Input::get('status');
                        $career->date      = Input::get('date');
                        $career->responsibilities  = Input::get('Responsibilities');
                        $career->requirements         = Input::get('Requirements');
                        //$career->footertext         = Input::get('url');
		 
			$career->save();
                       
			// redirect
			Session::flash('message', 'The information has been saved successfully!');
			return Redirect::to('career_vac_edit');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function edit_career($id)
	{
		// get the nerd
		$career = Career::find($id);

		// show the edit form and pass the nerd
		return View::make('admin.update_vacancy')
			->with('career', $career);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'jobtitle'       => '',
			'status'      => '',
			'date'      => '',
                        'responsibilities'  => '',
                        'requirements'         => ''
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('career_vac_edit/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$career = Career::find($id);
			$career->jobtitle       = Input::get('job_title');
			$career->status      = Input::get('status');
                        $career->date      = Input::get('date');
                        $career->responsibilities  = Input::get('job_responsibilities');
                        $career->requirements         = Input::get('job_requirements');
                        $career->footertext         = Input::get('job_footer_content');
			$career->save();

			// redirect
			Session::flash('message', 'The information has been updated successfully!');
			return Redirect::to('career_vac_edit');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function dodestroy($id)
	{
		// delete
		$career = Career::find($id);
		$career->delete();

		// redirect
		Session::flash('message', 'The information has been Deleted successfully!');
		return Redirect::to('career_vac_edit');
	}

}