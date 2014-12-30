<?php

class AdminIndexPageController extends BaseController {

	

	public function showIndexPageEditor()
	{
            if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
            
            $number_of_record = Input::get('limit') ? Input::get('limit') : 2 ;
            
            $Business = CoreBusiness::all();
            $montages = Montage::paginate($number_of_record);
            $page = Page::find(1);
            $user = Session::get('user');
            return View::make('admin.index_edit')
                    ->with('user', $user)
                    ->with('businesses_create', $Business)
                    ->with('montages', $montages)
                    ->with('page', $page)
                    ->with('limit', $number_of_record);
	}
        /*
        public function web_scrapping_delete_all()
        {

            //$Webscrappingurl = new Webscrappingurl();

            if(Input::get('selectionCheck') != null){
                $id = array();
                $id = Input::get('selectionCheck');
                //$delete = $Webscrappingurl->deleteMultipleUrls($id);
            }else{
                if( Input::get('deleteHidden') == 'all'){
                    //$delete = $Webscrappingurl->deleteMultipleUrls('all');
                }else{
                    $delete = false;
                }
            }

            if ($delete)
            {
                Session::put('success', 1);
                Session::put('message', 'Item Successfully Deleted');
            }
            else {
                Session::put('success', 2);
                Session::put('message', 'Something Went Wrong!! Please Try again');
            }
            return Redirect::to('admin/web_scrapping_list');

        } */

}
