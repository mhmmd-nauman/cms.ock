<?php

class PageController extends BaseController {

	
        
        public function doStore()
	{
		// validate
		//print_r($_REQUEST);
                //exit;
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
			Session::flash('message', 'The information has been saved successfully!');
			return Redirect::to('index_edit');
		}
	}
        public function updateContents(){
            //print_r($_POST);
            //editorID
            $page = Page::find(1);
            switch(Input::get('editorID')){
                case"heading1":
                    $page->heading1       = Input::get('editabledata');
                    $page->save();
                    break;
                case"body1":
                    $page->body1          = Input::get('editabledata');
                    $page->save();
                    break;
                case"heading2":
                    $page->heading2          = Input::get('editabledata');
                    $page->save();
                    break;
                case"body2":
                    $page->body2          = Input::get('editabledata');
                    $page->save();
                    break;
            }
        }
}
