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
		$montages = Montage::all();
                $homePageData = Page::find(1);
                $CoreBusiness = CoreBusiness::all();
                
                //echo "<pre>";
                //print_r($nerds);
                //echo "</pre>";
		// load the view and pass the nerds
		return View::make('front.index')
			->with('montages', $montages)
                        ->with('homePageData', $homePageData)
                        ->with('businesses_create', $CoreBusiness)
                       
                        ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
        public function Online_job_vacancy($vacancy_id)
	{
        $montages = Montage::all();
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
                        ->with('montages', $montages)
                        ->with('vacancy_id', $vacancy_id)
                        ;
                                    
                        
	}
	public function create()
	{
		// load the create form (app/views/nerds/create.blade.php)
            $montages = Montage::all();
            $homePageData = Page::find(1);
            $careers = Career::all();
            return View::make('front.careers')
                    ->with('montages', $montages)
                     ->with('job_vacancies_data', $careers)
                    ;
                                    
                        
	}
public function online_apply_form($vacancy_id)
	{
		// load the create form (app/views/nerds/create.blade.php)
          $montages = Montage::all();
        $Education_data = array();
        $Education_data['HigherLevel']="Higher secondary / STPM / &quot;A&quot; Level / Pre-U";
        $Education_data['DiplomaHigher']="Diploma / Advanced Higher / Graduate Diploma";
        $Education_data['ProfessionalDegree']="Professional Certificated / Degree / Master";
        
        $Country_data = array();
        $Country_data['Select']="-- Select--";
        $Country_data['UnitedKingdom']="United Kingdom";
        $Country_data['America']="United States of America";
        $Country_data['UAE']="United Arab Emirates";
            return View::make('front.online_job_application')
                     ->with('vacancy_id', $vacancy_id)
                    ->with('education_data', $Education_data)
                        ->with('country_data', $Country_data)
                        ->with('montages', $montages)
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
                        'career_vacancy_id'  => '',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('online_apply_form')
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
                        $Home->career_vacancy_id= Input::get('vacancy_id');
                      if (Input::hasFile('CV_docs')){
                        Input::file('CV_docs')->move(public_path()."/uploads/cv/",Input::file('CV_docs')->getClientOriginalName());
                        $Home->CV      = Input::file('CV_docs')->getClientOriginalName();
                        //$url = $file->getURL();
                       
                    }
		  
			$Home->save();

			// redirect
			Session::flash('message', 'Thank you! You have successfully submitted your CV. Only short listed candidates will be notified for interview.');
                        Session::flash('eror_message', '<strong>Error!</strong> Please correct the errors in the form below.');
			return Redirect::to('online_apply_form/'.Input::get('vacancy_id'));
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
       public function getDownload(){
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/download/info.jpg";
        $headers = array(
              'Content-Type: application/jpg',
            );
        return Response::download($file, 'filename.jpg', $headers);
}

}