<?php

class IndexController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            //echo "its here";
		// get all the nerds
		$Home = Home::all();
                //echo "<pre>";
                //print_r($nerds);
                //echo "</pre>";
		// load the view and pass the nerds
		return View::make('front.online_job_application')
			->with('JobsApplications', $Home);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
        public function Online_job_vacancy()
	{
        $Education_data = array();
        $Education_data['HigherLevel']="Higher secondary / STPM / &quot;A&quot; Level / Pre-U";
        $Education_data['DiplomaHigher']="Diploma / Advanced Higher / Graduate Diploma";
        $Education_data['ProfessionalDegree']="Professional Certificated / Degree / Master";
        
        $Country_data = array();
        $Country_data['Select']="-- Select--";
        $Country_data['UnitedKingdom']="United Kingdom";
        $Country_data['America']="United States of America";
        $Country_data['UAE']="United Arab Emirates";
		// load the create form (app/views/nerds/create.blade.php)
		return View::make('front.online_job_application')
                        ->with('education_data', $Education_data)
                        ->with('country_data', $Country_data)
                        ;
                                    
                        
	}
	public function create()
	{
		// load the create form (app/views/nerds/create.blade.php)
		return View::make('front.careers');
                                    
                        
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
			'name'           => '',
			'DOB'            => '',
			'Email'          => '',
                        'ContactNumber'  => '',
                        'MobileNumber'   => '',
                        'EducationLevel' => '',
                        'Address'        => '',
                        'City'           => '',
                        'State'          => '',
                        'PostalCode'     => '',
                        'Country'        => '',
                        'CV'             => '',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('online_apply')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$Home = new Home;
			$Home->name          = Input::get('Name');
			$Home->DOB           = Input::get('DOB');
                        $Home->Email         = Input::get('Email');
                        $Home->ContactNumber = Input::get('Phone');
                        $Home->MobileNumber  = Input::get('MPhone');
                        $Home->EducationLevel= Input::get('Education_Level');
                        $Home->Address       = Input::get('Address');
                        $Home->City          = Input::get('City');
                        $Home->State         = Input::get('State');
                        $Home->PostalCode    = Input::get('Postal_Code');
                        $Home->Country       = Input::get('Country');
                        $Home->CV            = Input::get('CV_docs');
		  if (Input::hasFile('CV_docs')){
                        Input::file('CV_docs')->move(public_path()."/img/",Input::file('CV_docs')->getClientOriginalName());
                        $localFilePath = public_path()."/img/".Input::file('CV_docs')->getClientOriginalName();
                        $file = ParseFile::createFromFile($localFilePath, Input::file('CV_docs')->getClientOriginalName());
                        $file->save();
                        //$url = $file->getURL();
                       
                    }
			$Home->save();

			// redirect
			Session::flash('message', 'Thank you! You have successfully submitted your CV. Only short listed candidates will be notified for interview.');
                        Session::flash('eror_message', '<strong>Error!</strong> Please correct the errors in the form below.');
			return Redirect::to('online_apply');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the nerd
		$nerd = Nerd::find($id);

		// show the view and pass the nerd to it
		return View::make('nerds.show')
			->with('nerd', $nerd);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the nerd
		$nerd = Nerd::find($id);

		// show the edit form and pass the nerd
		return View::make('admin.index_edit')
			->with('nerd', $nerd);
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
			'title'       => 'required',
			'status'      => 'required',
			'Banner'      => '',
                        'MoreStatus'  => '',
                        'url'         => ''
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('index_edit/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$montage = Montage::find($id);
			$montage->title       = Input::get('title');
			$montage->status      = Input::get('status');
                        $montage->Banner      = Input::get('Banner_image');
                        $montage->MoreStatus  = Input::get('morestatus');
                        $montage->url         = Input::get('url');
			$montage->save();

			// redirect
			Session::flash('message', 'The information has been updated successfully!');
			return Redirect::to('index_edit');
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
		$montages = Montage::find($id);
		$montages->delete();

		// redirect
		Session::flash('message', 'The information has been deleted successfully!');
		return Redirect::to('index_edit');
	}

}