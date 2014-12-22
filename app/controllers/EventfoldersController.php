<?php

class EventfoldersController extends \BaseController {

	/**
	 * Display a listing of eventfolders
	 *
	 * @return Response
	 */
	public function index()
        {
            if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
            $user = Session::get('user');
            $eventfolders = Eventfolder::all();
                
            return View::make('eventfolders.news_event_edit')
                   ->with('user', $user)
                   ->with('eventfolders', $eventfolders);
	}

	/**
	 * Show the form for creating a new eventfolder
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('eventfolders.create');
	}

	/**
	 * Store a newly created eventfolder in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//echo 'Asif';
           
            $eventfolder= new Eventfolder;
            $image = Input::file('picture');
            $destinationPath = public_path().'/uploads/';
            $filename = $image->getClientOriginalName();
            Input::file('picture')->move($destinationPath, $filename);
            $eventfolder->status       = Input::get('status');
            $eventfolder->date      = Input::get('date');
            $eventfolder->eventtittle = Input::get('eventtittle');
            $eventfolder->file = "/uploads/".$filename;
            $eventfolder->save();
            return Redirect::to('addnew/');
	}

	/**
	 * Display the specified eventfolder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$eventfolder = Eventfolder::findOrFail($id);

		return View::make('eventfolders.show', compact('eventfolder'));
	}

	/**
	 * Show the form for editing the specified eventfolder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$eventfolder = Eventfolder::find($id);

		return View::make('eventfolders.edit', compact('eventfolder'));
	}

	/**
	 * Update the specified eventfolder in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$eventfolder = Eventfolder::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Eventfolder::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$eventfolder->update($data);

		return Redirect::route('eventfolders.index');
	}

	/**
	 * Remove the specified eventfolder from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Eventfolder::destroy($id);

		return Redirect::route('eventfolders.index');
	}
        public function showNewsEvent()
	{
            if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
            $user = Session::get('user');
            return View::make('eventfolders.news_event_edit')->with('user', $user);
	}

}
