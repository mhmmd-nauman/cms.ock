<?php


class AdminController extends BaseController {	

	public function __construct() {         
        //parent::__construct();
                
    }

    public function index() { 
    	return View::make('admin.admin_login');
    }
    
    public function showPage($page=""){
        if (!Session::has('user')) {          
            return Redirect::to('ListDeedAdmin');
        }
        $user = Session::get('user');
            
            return View::make('admin.'.$page)
                    ->with('user', $user)
                    ;
            
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
			return Redirect::to('ListDeedAdmin')
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
                            //echo 'Login field is required.';
                            Session::flash('error_message', 'Login field is required.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
                        {
                            //echo 'Password field is required.';
                            Session::flash('error_message', 'Password field is required.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
                        {
                            //echo 'Wrong password, try again.';
                            Session::flash('error_message', 'Wrong password, try again.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
                        {
                            //echo 'User was not found.';
                            Session::flash('error_message', 'User was not found.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
                        {
                            //echo 'User is not activated.';
                            Session::flash('error_message', 'User is not activated.');
                            return Redirect::to('ListDeedAdmin');
                        }

                        // The following is only required if the throttling is enabled
                        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
                        {
                            //echo 'User is suspended.';
                            Session::flash('error_message', 'User is suspended.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
                        {
                            //echo 'User is banned.';
                            Session::flash('error_message', 'User is banned.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        
                        
                        

                        // The login failed. Check error to see why.
                       
                       

		}
    }
    public function adminLogout() {
        Sentry::logout();
        return Redirect::to('ListDeedAdmin');
    }
    
    
    public function showDashboard(){
        if (!Session::has('user')) {          
            return Redirect::to('ListDeedAdmin');
        }
        $user = Session::get('user');
        
        $job_vacancy = Career::all();
        $online_applications = Vacancy::all();
        $last_5_vacancy = Vacancy::orderBy('id', 'desc')->take(5)->get();
        $eventfolders = Eventfolder::all();
        return View::make('admin.dashboard')
                        ->with('user', $user)
                        ->with('last_5_vacanies',$last_5_vacancy)
                        ->with('total_applications',$online_applications)
                        ->with('total_vacancy',$job_vacancy)
                        ->with('total_events',$eventfolders)
            ;
    }
    
    
        
        
       // $page->save();
        //echo "wow";
    
    public function ForgotPassword() {
    		// validate the info, create rules for the inputs
	
		 return View::make('admin.forgot_password');
                         
    }
    public function ProcessForgotPassword() {
    		// validate the info, create rules for the inputs
	try
        {
            // Find the user using the user email address
            $user = Sentry::findUserByLogin(Input::get('email'));

            // Get the password reset code
            $resetCode = $user->getResetPasswordCode();
            
            //return View::make('admin.forgot_password');
            
            
            Mail::send('emails.auth.reminder', array('resetCode' => $resetCode,'id'=>$user->id), function($message)
            {
                $message->to(Input::get('email'), "My Name")->subject('Reset Password Request');
            });
            //return Redirect::to('ActivatePassword/'.$resetCode.'/'.$user->id);
            // Now you can send this code to your user via email for example.
            Session::flash('message', 'The information has been sent on email successfully.');
            return View::make('admin.forgot_password');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            Session::flash('error_message', 'We are unable to find email in database.');
            return View::make('admin.forgot_password');
        }
		 
                         
    }
    public function ActivateNewPassword($passcode,$user_id) {
        
        return View::make('admin.activate_new_password')
                ->with('passcode', $passcode)
                ->with('user_id', $user_id);
    }
    
    public function ProcessNewPassword(){
        try
        {
            //print_r($_POST);
            //exit;
            // Find the user using the user id
            $user = Sentry::findUserById(Input::get('user_id'));
           
            // Check if the reset password code is valid
            if ($user->checkResetPasswordCode(Input::get('passcode')))
            {
                // Attempt to reset the user password
                if ($user->attemptResetPassword(Input::get('passcode'), Input::get('password')))
                {
                    // Password reset passed
                    Session::flash('message', 'Your password has been updated successfully.');
                     return Redirect::to('ListDeedAdmin');
                }
                else
                {
                    // Password reset failed
                    Session::flash('error_message', 'We are unable to set password.');
                     return Redirect::to('ListDeedAdmin');
                }
            }
            else
            {
                // The provided password reset code is Invalid
            }
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
    }
   
}