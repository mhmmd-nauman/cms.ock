<?php

class PageController extends BaseController {

	
        
        public function doStore()
	{
		// validate
		print_r($_REQUEST);
                exit;
		$rules = array(
			//'name'       => 'required',
			
			
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('index_edit')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$page = new Page;
			//$nerd->name       = Input::get('name');
			//$nerd->email      = Input::get('email');
			//$nerd->nerd_level = Input::get('nerd_level');
			//$nerd->save();

			// redirect
			Session::flash('message', 'Successfully created!');
			return Redirect::to('index_edit');
		}
	}

}
