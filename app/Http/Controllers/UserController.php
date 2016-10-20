<?php

	namespace App\Http\Controllers;

	//use Illuminate\Http\Request;
	use App\Http\Requests;
	use App\User;
	use Illuminate\Database\Eloquent\Model;
	use Request;	
	use DB;
	use Auth;
	use Validator;
	use Session;

	class UserController extends Controller
	{
	    public function postRegister(Request $request){
	    	//Get all users input as json
	    	$input = Request::all();
	    	//input variables
	    	$names = $input['names'];
	    	$username = $input['username'];
	    	$email = $input['email'];
	    	$password = $input['password'];
	    	//form validation
	    	$validator = Validator::make($input, [
	    		'names' => 'required',
	    		'username' => 'required|min:6|max:25',
	    		'email' => 'email|required',
	    		'password' => 'required|min:8'
	    	]);
	    	if ($validator->fails()) {
	    		return redirect('register')->withInput()->withErrors($validator);
	    	}
	    	//Post to DB
	    	DB::table('users')->insert([
	    		'names' => $names,
	    		'username' => $username,
	    		'email' => $email,
	    		'password' => bcrypt($password), // bcrypt encrpts the password
	    		'created_at' => date("Y-m-d H:i:s")
	    	]);
	    	//redirect to signup page
	  		return redirect('register')->with('message', ['type' => 'success', 'text' => 'User was successfully created.' ]);
	    }


	    public function getLogin(){
	        if (Auth::check()) {
	            return redirect('dashboard');
	        }
	        return view('auth.login');
	    }

	    public function postLogin(Request $request){
	        $input = Request::all();
	        //Validate User Input
	        $validator = Validator::make($input, [
	            'email' => 'email|required',
	            'password' => 'required|min:8'
	        ]);
	        if ($validator->fails()) {
	            return redirect('login')->withInput()->withErrors($validator);
	        }

	        $email = $input['email'];
	        $password = $input['password'];
	        if (Auth::attempt((['email' => $email, 'password' => $password ]))) {
	            if (Auth::check()) {
	                $user = Auth::user();
	                return $user;              
	                return redirect('/dashboard');
	            }
	        }else{
	            //invalid credentials
	            \Session::flash('message', ['type' => 'error', 'text' => 'User login was no successful.' ]);
	            return redirect('/login');
	        }
	    }    

	    public function getLogout(Request $request){
	        if (Auth::check()) {
	            Auth::logout();
	            return redirect('/');
	        }else{
	            return 'User not logged in.';
	        }
	    
	    }       

	}


?>