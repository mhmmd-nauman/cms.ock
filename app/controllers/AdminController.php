<?php


class AdminController extends BaseController {	

	public function __construct() {         
        //parent::__construct();
                
    }

    public function index() { 
    	return View::make('admin.admin_login');
    }

    public function adminLogin() {
    		// validate the info, create rules for the inputs
		$rules = array(
			'username'    => 'required', // make sure its required
			'password'    => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('adminLogin')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			// attempt to do the login
                        
                        try
                        {
                            // Login credentials
                            $credentials = array(
                                'email'    => Input::get('username'),
                                'password' => Input::get('password'),
                            );

                            // Authenticate the user
                            $user = Sentry::authenticate($credentials, false);
                            Session::put('user', $user);
                            return Redirect::to('dashboard');
                        }
                        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
                        {
                            echo 'Login field is required.';
                            return Redirect::to('adminLogin');
                        }
                        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
                        {
                            echo 'Password field is required.';
                            return Redirect::to('adminLogin');
                        }
                        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
                        {
                            echo 'Wrong password, try again.';
                            return Redirect::to('adminLogin');
                        }
                        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
                        {
                            echo 'User was not found.';
                            return Redirect::to('adminLogin');
                        }
                        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
                        {
                            echo 'User is not activated.';
                            return Redirect::to('adminLogin');
                        }

                        // The following is only required if the throttling is enabled
                        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
                        {
                            echo 'User is suspended.';
                            return Redirect::to('adminLogin');
                        }
                        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
                        {
                            echo 'User is banned.';
                            return Redirect::to('adminLogin');
                        }
                        
                        
                        

                        // The login failed. Check error to see why.
                       
                       

		}
    }
    public function adminLogout() {
        Sentry::logout();
        return Redirect::to('ListDeedAdmin');
    }
    
    public function home() { 
    	if (!Session::has('user')) {          
        	return Redirect::to('ListDeedAdmin');
        }
    	$user = new ParseQuery("_User");       
        $results = $user->find();			
		$html = '';
        //Iterate Data..
        foreach ($results as $key => $user) {        	
        	$html .= '<tr class="odd gradeX">';

        	//UserName add into html.
        	$html .= '<td>'.$user->get('username').'</td>';
        	$html .= '<td>'.$user->get('firstName').' '.$user->get('lastName').'</td>';
        	$html .= '<td>'.$user->get('email').'</td>';
        	$html .= '<td>&nbsp;</td>';

        	//Actions.
        	$html .= '<td><a href="edit-profile/'.$user->getObjectId().'" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>';
        	$html .='<a href="#" class="btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</a>';
			$html .= '<a href="Profile/'.$user->getObjectId().'" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-info"></i>Profile</a></td>';
			$html .= '</tr>';
        }       
    	return View::make('admin.user_list')
			->with('html', $html);
    }


    public function showEditProfile($profileId){
    	if (!Session::has('user')) {          
        	return Redirect::to('ListDeedAdmin');
        }
    	try {
	    	if(isset($profileId) && !empty($profileId)){
	    		$user = new ParseQuery("_User"); 
	    		$userObj = $user->get($profileId);    		
		    	$html = '<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="/update-profile">';
		    	$html .= '<div class="row"><div class="col-md-12"><div class="panel panel-primary" data-collapsed="0">';
		    	$html .= '<div class="panel-heading"><div class="panel-title">Edit Member</div>';
		    	$html .= '<div class="panel-options"><a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a><a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a></div></div>';


		    	$html .= '<div class="panel-body">';
	    		$html .='<div class="form-group"><label for="field-1" class="col-sm-3 control-label">First Name</label><div class="col-sm-5"><input type="text" class="form-control" id="field-1" name="firstName" value="'.$userObj->get('firstName').'"></div></div>';

		    	$html .='<div class="form-group"><label for="field-1" class="col-sm-3 control-label">Last Name</label><div class="col-sm-5"><input type="text" class="form-control" id="field-1" name="lastName" value="'.$userObj->get('lastName').'"></div></div>';

		    	$html .='<div class="form-group"><label for="field-1" class="col-sm-3 control-label">UserName</label><div class="col-sm-5"><input type="text" class="form-control" id="field-1" name="username" value="'.$userObj->get('username').'"></div></div>';

		    	$html .='<div class="form-group"><label for="field-1" class="col-sm-3 control-label">Email</label><div class="col-sm-5"><input type="text" class="form-control" id="field-1" name="email" value="'.$userObj->get('email').'"></div></div>';

		    	$html .='<div class="form-group"><label for="field-1" class="col-sm-3 control-label">Address</label><div class="col-sm-5"><input type="text" class="form-control" id="field-1" name="mailingAddress" value="'.$userObj->get('mailingAddress').'"><input type="hidden" class="form-control" id="field-1" name="id" value="'.$userObj->getObjectId().'"></div></div>';

		    	$html .= '</div></div></div>';
		    	$html .= '<div class="form-group default-padding"><button type="submit" class="btn btn-success">Save Changes</button>&nbsp;&nbsp;<a href="'.URL::to('users').'" class="btn">Cancel </a></div></form>';

		    	return View::make('admin.edit_profile')
					->with('html', $html);
			}
			return Redirect::to('index');
		}
		catch (ParseException $ex) {
            // The object was not retrieved successfully.
            // error is a ParseException with an error code and message.
        }
    }

    public function showDashboard(){
        if (!Session::has('user')) {          
            return Redirect::to('ListDeedAdmin');
        }
        $user = Session::get('user');
        
        return View::make('admin.dashboard')->with('user', $user);
    }

    public function updateProfile() { 
    	if (!Session::has('user')) {          
        	return Redirect::to('ListDeedAdmin');
        }
    	$rules = array(
                    'id' =>'required',                       
				); 	
    	$validator = Validator::make(Input::all(), $rules);
    	if ($validator->fails()) {
    		return Redirect::to('edit-profile/'.Input::get('id'))
                            ->withErrors($validator); // send back the input (not the password) so that we can repopulate the form
    	}
    	else {   
    		try {

                // By specifying no write privileges for the ACL, we can ensure the role cannot be altered.
                //$roleACL = new ParseACL();
                //$roleACL->setPublicReadAccess(true);
               // $role = ParseRole::createRole("Administrator", $roleACL);
                //$user = new ParseQuery("_User"); 
                //$userObj = $user->get('NOUb3M5ETU');
                //$role->getUsers()->add($userObj);
               // $role->save();


                //$role = new ParseQuery("_Role");
                //$obj=$role->get("07EDG9rLPV");
                
                $user = new ParseQuery("_User"); 
               // $userObj = $user->get('oR7cP2Gj6a');

              //  $obj->set("users",$userObj);
             ///   $obj->save();
               //// echo "<pre>";print_r($obj->get("users"));
              //  die(' rere');
                
              //  $query = ParseRole::query();
              //  $query->equalTo("name","MyRole");
              //  echo "<pre>";print_r($query->count());
                
                $userObj=$user->get('NOUb3M5ETU'); 
                $userObj->set("firstName", "akash");
	            //$userObj->set("lastName", Input::get('lastName'));
	            //$userObj->set("username", Input::get('username'));
	            //$userObj->set("email", Input::get('email'));
	            //$userObj->set("mailingAddress", Input::get('mailingAddress'));            
            	$userObj->save();
            	//Session::flash('message', 'Successfully updated!');
                //return Redirect::to('edit-profile/'.Input::get('id'));
            }
            catch (ParseException $ex) {  
                  // Execute any logic that should take place if the save fails.
                  // error is a ParseException object with an error code and message.
                  echo 'Failed to create new object, with error message: ' + $ex->getMessage();
            }            
    	}
    }

    public function userProfile($profileId){  
    	if (!Session::has('user')) {          
        	return Redirect::to('ListDeedAdmin');
        }  	
    	if(isset($profileId) && !empty($profileId)){
    		$user = new ParseQuery("_User"); 
    		$userObj = $user->get($profileId);

    		//Manage Profile html.
    		$html = '<header class="row">';
    		$profile_pic = is_object($userObj->get("profilePicture"))?$userObj->get("profilePicture")->getURL():"/assets/images/profile-picture.png";
    		$html .= '<div class="col-sm-2"><a href="#" class="profile-picture"><img height="115" width="115" src="'.$profile_pic.'" class="img-responsive img-circle" /></a></div>';

    		//Manage Other details.
    		$html .= '<div class="col-sm-7"><ul class="profile-info-sections"><li><div class="profile-name"><strong>';
    		$html .= '<a href="#">'.$userObj->get('firstName').' '.$userObj->get('lastName').'</a>';
    		$html .= '<a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Online"></a>';
    		$html .= '</strong>';
    		$html .= '<span><a href="#">'.$userObj->get('profession').'</a></span>';
    		$html .= '</div></li>';
    		//$html .= '<li><div class="profile-stat"><h3>643</h3><span><a href="#">followers</a></span></div></li>';
    		//$html .= '<li><div class="profile-stat"><h3>108</h3><span><a href="#">following</a></span></div></li>';
    		$html .= '</ul></div>';	   
    		$html .= '<div class="col-sm-3"><div class="profile-buttons"><a href="#" class="btn btn-default"><i class="entypo-user-add"></i>Follow</a><a href="#" class="btn btn-default"><i class="entypo-mail"></i></a></div></div></header>';
	
    		$html .= '<section class="profile-info-tabs"><div class="row"><div class="col-sm-offset-2 col-sm-10"><ul class="user-details">';
    		$html .= '<li><a href="#"><b>User Name : '.$userObj->get('username').'</b></a></li>';
    		$html .= '<li><a href="#"><b>First Name : '.$userObj->get('firstName').'</b></a></li>';
    		$html .= '<li><a href="#"><b>Last Name : '.$userObj->get('lastName').'</b></a></li>';
    		$html .= '<li><a href="#"><b>Email : '.$userObj->get('email').'</b></a></li>';
    		$html .= '<li><a href="#"><i class="entypo-suitcase"></i><b>Works as <span>'.$userObj->get('profession').'</b></span></a></li>';
    		$html .= '<li><a href="#"><i class="entypo-calendar"></i><b>'.$userObj->getCreatedAt()->format('d M').'</b></a></li>';

    		$html .= '</ul></div></div></section>';
			return View::make('admin.profile')
				->with('html', $html);
    	}
    	return Redirect::to('index');    	
    }
}