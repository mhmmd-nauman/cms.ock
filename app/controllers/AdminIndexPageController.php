<?php

class AdminIndexPageController extends BaseController {

	

	public function showIndexPageEditor()
	{
            if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
            $Business = CoreBusiness::all();
            $montages = Montage::all();
            $page = Page::find(1);
            $user = Session::get('user');
            return View::make('admin.index_edit')
                    ->with('user', $user)
                    ->with('businesses_create', $Business)
                    ->with('montages', $montages)
                    ->with('page', $page);
	}

}
