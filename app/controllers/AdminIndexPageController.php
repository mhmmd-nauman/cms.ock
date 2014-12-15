<?php

class AdminIndexPageController extends BaseController {

	

	public function showIndexPageEditor()
	{
            if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
            $user = Session::get('user');
            return View::make('admin.index_edit')->with('user', $user);
	}

}
