<?php

class BusinessController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
  {
            //echo" ffff";
        $Business = CoreBusiness::all();
        //print_r($Business);
        
        //return View::make('admin.index_edit', compact('admin'));
        return View::make('admin.index_edit')
			->with('businesses_create', $Business);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            
		// load the create form (app/views/nerds/create.blade.php)
		return View::make('admin.index_edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function doStore()
	{
           
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'icon'       => 'required',
			'title'      => 'required',
                        'url'        => 'required',
			
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('index_edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$Business = new CoreBusiness;
			$Business->icon       = Input::get('icon');
			$Business->title      = Input::get('title');
                        $Business->url      = Input::get('url');
			
			//$Business->save();
                        
			// redirect
			Session::flash('message', 'Successfully created!');
			return Redirect::to('index_edit');
		}
	}
        public function edit($id)
	{
		// get the nerd
		$Business = CoreBusiness::find($id);

		// show the edit form and pass the nerd
		return View::make('admin.index_edit')
			->with('nerd', $Business);
	}

public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'icon'       => '',
			'title'      => '',
			'url'      => ''
                       
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('index_edit/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$Business = CoreBusiness::find($id);
			$Business->icon       = Input::get('icon');
			$Business->title      = Input::get('title');
                        $Business->url      = Input::get('url');
                        
			$Business->save();

			// redirect
			Session::flash('message', 'The information has been updated successfully !');
			return Redirect::to('index_edit');
		}
	}
	
	
}