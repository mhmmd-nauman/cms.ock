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
    
    
    public function showDashboard(){
        if (!Session::has('user')) {          
            return Redirect::to('ListDeedAdmin');
        }
        $user = Session::get('user');
        
        return View::make('admin.dashboard')->with('user', $user);
    }
    
    
        
        
       // $page->save();
        //echo "wow";
    
public function ForgotPassword() {
    		// validate the info, create rules for the inputs
	
		 return View::make('admin.forgot_password');
                         
    }
   
}