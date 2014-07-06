<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
  		$this->layout = View::make('login.wip');
	}

	public function login()
	{
		$this->layout = View::make('login.form_login');
	}


	public function logout()
	{
			Auth::logout();		
			Session::flush();
			return Redirect::to('login');
	}
	

	public function login_process()
	{
 
		$userdata = array(
			'username'  => Input::get('username'),
			'password' =>  (Input::get('password')),
			'active' => 1,
			'deleted'=>0
			);
		$value = array(
	        'username' => Input::get('username'),
	        'password' => Input::get('password')
	    );

	    $userForLogin = new User;
	    
	    if( $userForLogin->validaLogin($value) == false)
	    {
	        return Redirect::to('login')->withInput()->withErrors($userForLogin->errors());
	    }
	    else 
	    {
			
			if( Auth::attempt($userdata) ){
	 			
	 			$user = User::where('username', '=', $userdata['username'])->first();

	 			$mysqldate = date('Y-m-d H:i:s'); 
	 			$user->lastlogin_at = date('Y-m-d H:i:s'); 
	 			
				$user->save();

				$message = Lang::get('notification.last_login', array( 'data' => date('m/d/Y H:i:s')));
				$type = 'info';
				User::setEvents($user->id, $message, $type);

	 			Session::put('username', $userdata['username']);
				Session::put('userrole', $user['role']);
				Session::put('userid', $user['id']);
				Session::put('nameComplete', $user['name'] . ' ' . $user['surname']);

				//set language
				Session::put('Language',  $user['language']);
				//echo $user['language'];
				//echo '****';

	 			switch ($user['role']){
	 				 case 1:
	 				 	Session::put('role_admin', $user['role']);
		                return Redirect::to('home_admin');
		                break;
		             case 2:
		             case 3:
		             case 4:
		             case 5:
		             	 
		                return Redirect::to('home_promoter');
		                break;
		             
		             case 6:
		             	Session::put('role_tecnico', $user['role']);
		                return Redirect::to('home_tecnico');
		                break;
		            default   :
	                	return Redirect::to('login');
	                	break;
	 			}
			}else{
				return Redirect::to('login');
			}
		}
	}

	public function area_utenti()
	{
		$this->layout = View::make('area.main');
	}

	public function home_admin()
	{
		if(Role::isAdministrator(Auth::user()->id)){

			$stats = DB::table('graph_a_1')->orderBy('numero', 'desc')->take(5)->get();
 			$s1 = '';
			if($stats)
			{
	 			foreach ($stats as $elem) {
				    

				    $s1 = '[ \''. str_replace("'", "\'", $elem->city).'\' , '.$elem->numero.' ],'.$s1 ;
				}
			} else 	$s1 = "['nessuna visita',1]";

			$sp1=$s1;

			$stats = DB::table('graph_a_2')->orderBy('numero', 'desc')->take(5)->get();
 			$s1 = '';
			if($stats)
			{
	 			foreach ($stats as $elem) {
				    

				    $s1 = '[ \''. str_replace("'", "\'", $elem->visit).'\' , '.$elem->numero.' ],'.$s1 ;
				}
			} else 	$s1 = "['nessuna visita',1]";

			$sp2=$s1;


			
			  
			$stats = DB::table('graph_a_3')->get(); // DB::table('stats_all_communities_day')->get();



			  $label = "{label:'click'}";
			  $sl1 = "";
			  $lticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";
			  

			  $label = true;
			  foreach ($stats as $elem) {
			    

			    //$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'[ \''.$elem->data_stat.'\',  '.$elem->cnt.']  ';
			    
			  	$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'  '.$elem->numero.' ';
			    if ($label)
			    {
			    	$lticks = ((strlen($lticks) > 1 )?$lticks.',':$lticks)  . "'".str_replace("'", "\'", $elem->data_stat)."'";
			    	$label = false;
			    } else
			    {

			    	$lticks = ((strlen($lticks) > 1 )?$lticks.',':$lticks)  . "''";
			    	$label = true;
			    }
			    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";

			  }


			  

			  $data['sp1'] =  $sp1;
			  $data['sp2'] =  $sp2;

			  $data['sl1'] =  $sl1;
			  $data['lticks'] =  $lticks;

			$data['campaigns_list'] = Visit::orderBy('visit_at', 'desc')->take(8)->get(); // lastestvisit
			
			$this->layout = View::make('home.admin', $data);
		}else{
			return Redirect::action('HomeController@logout');
		}
	}
	

	public function home_promoter()
	{
		if(Auth::user()->role> 1 && Auth::user()->role<6 ){

			$stats = DB::table('graph_p_1')->where('user_created', Auth::user()->id)->orderBy('numero', 'desc')->take(5)->get();
 			$s1 = '';
			if($stats)
			{
	 			foreach ($stats as $elem) {
				    

				    $s1 = '[ \''. str_replace("'", "\'", $elem->city).'\' , '.$elem->numero.' ],'.$s1 ;
				}
			} else 	$s1 = "['nessuna visita',1]";

			$sp1=$s1;

			$stats = DB::table('graph_p_2')->where('user_created', Auth::user()->id)->orderBy('numero', 'desc')->take(5)->get();
 			$s1 = '';
			if($stats)
			{
	 			foreach ($stats as $elem) {
				    

				    $s1 = '[ \''. str_replace("'", "\'", $elem->visit).'\' , '.$elem->numero.' ],'.$s1 ;
				}
			} else 	$s1 = "['nessuna visita',1]";

			$sp2=$s1;


			
			  
			$stats = DB::table('graph_p_3')->where('user_created', Auth::user()->id)->get(); // DB::table('stats_all_communities_day')->get();


			  $label = "{label:'click'}";
			  $sl1 = "";
			  $lticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";
			  

			  $label = true;
			  foreach ($stats as $elem) {
			    

			    //$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'[ \''.$elem->data_stat.'\',  '.$elem->cnt.']  ';
			    
			  	$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'  '.$elem->numero.' ';
			    if ($label)
			    {
			    	$lticks = ((strlen($lticks) > 1 )?$lticks.',':$lticks)  . "'".str_replace("'", "\'", $elem->data_stat)."'";
			    	$label = false;
			    } else
			    {

			    	$lticks = ((strlen($lticks) > 1 )?$lticks.',':$lticks)  . "''";
			    	$label = true;
			    }
			    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";

			  }


			  

			  $data['sp1'] =  $sp1;
			  $data['sp2'] =  $sp2;

			  $data['sl1'] =  $sl1;
			  $data['lticks'] =  $lticks;


			$data['campaigns_list'] = $data['campaigns_list'] = Visit::where('user_created', Auth::user()->id)->orderBy('visit_at', 'desc')->take(8)->get();; // lastestvisit
			
			$this->layout = View::make('home.promoter', $data);
		}else{
			return Redirect::action('HomeController@logout');
		}
	}
	
	public function home_tecnico()
	{
		if(Role::isTecnico(Auth::user()->id)){
			$this->layout = View::make('home.tecnico');
		}else{
			return Redirect::action('HomeController@logout');
		}
	}



public function redirectToHome()
	{
				$userrole = Session::get('userrole');

		 			switch ($userrole){
	 				 case 1:
	 				 	if (Input::has('c'))
		                	return Redirect::to('home_admin?c='.Input::get('c'));
		                else
		                	return Redirect::to('home_admin');
		                break;
		             case 2:
		             	return Redirect::to('home_promoter');
		                break;
		             case 3:
		             	return Redirect::to('home_advertiser');
		                break;
		             case 4:
		             	return Redirect::to('home_tecnico');
		                break;
		            default   :
	                	return Redirect::to('login');
	                	break;
	                }

	}


	public function loginSSO()
	{
		$a = Input::get('token');
		$b = Input::get('controlcode');
		$c = Input::get('codeid');
		$d = Input::get('cntr');

		if ( is_null($a) || is_null($b) || is_null($c) || is_null($d))
		{

			return Redirect::to('/login?no');
		}
		else 
		{
			$id = 	substr($c,8,9);

			$tmp = User::find($id);
			if ($tmp)
			{
				$username = $tmp->username;
				
				//echo $tmp->username.date('Ymd');
				$a1 = md5($tmp->username.date('Ymd'));
				
				$b1 = md5($d.$id.'accesso');

				

				if ($a==$a1 && $b==$b1)
				{
					
					$mysqldate = date('Y-m-d H:i:s'); 
	 				$tmp->lastlogin_at = date('Y-m-d H:i:s'); 

	 			
					$tmp->save();
					Auth::login($tmp);

					$message = Lang::get('notification.last_login', array( 'data' => date('d/m/Y H:i:s')));
					$type = 'info';
					User::setEvents($tmp->id, $message, $type);

		 			Session::put('username', $tmp['username']);
					Session::put('userrole', $tmp['role']);
					Session::put('userid', $tmp['id']);
					Session::put('nameComplete', $tmp['name'] . ' ' . $tmp['surname']);

					//set language
					Session::put('Language',  $tmp['language']);
					
					//echo $user['language'];
					//echo '****';

		 			switch ($tmp['role']){
		 				 case 1:
		 				 	Session::put('role_admin', $tmp['role']);
			                return Redirect::to('home_admin');
			                break;
			             case 2:
			             	Session::put('role_promoter', $tmp['role']);
			                return Redirect::to('home_promoter');
			                break;
			             case 3:
			             	Session::put('role_advertiser', $tmp['role']);
			                return Redirect::to('home_advertiser');
			                break;
			             case 4:
			             	Session::put('role_tecnico', $tmp['role']);
			                return Redirect::to('home_tecnico');
			                break;
			            default   :
		                	return Redirect::to('login');
		                	break;
		 			}

					
				}else
				{
					return Redirect::to('/login?no_validation');

				}

			
				
			} else
			{
				return Redirect::to('/login?no_user');
			}

		}



		//$this->layout = View::make('login.form_login');
	}
    
    
    public function helpdesk()
	{
        if(Role::isAdv(Auth::user()->id)){
            
            $customer = Customer::whereUserId(Auth::user()->id)->first();
            
            if($customer){
                
                $data['destList']  = User::where('id',$customer['promoter_id'])->orderBy('id')->lists('surname', 'id');
                
                
                $this->layout = View::make('helpdesk.send',$data);
            }
        }else{
            $data['destList']  = User::where('role',1)->orderBy('id')->lists('surname', 'id');
            $this->layout = View::make('helpdesk.send',$data);
        }
	}

    public function send()
	{
		
		$userdata = array(
                'dest' => Input::get('dest'),
				'subject'  => Input::get('subject'),
				'message' => Input::get('message')
				);


        $user = User::find(Auth::user()->id);

        if( $user->validaSendTicket($userdata) == false)
        {
            return Redirect::action('HomeController@helpdesk' )->withInput()->withErrors($user->errors());
        }else
        {
            $userTo = User::find(Input::get('dest'));
            $namesurname = $user['name'].' '.$user['surname'];
            $maildata = array(
				'subject'  => Input::get('subject'),
				'msg' => Input::get('message'),
                'namesurname' => $namesurname
				);

            $messageTemplate = 'emails.ticket';
            
            $dest_mail = $userTo->email;
            $name_to = $userTo['name'].' '.$userTo['surname'];
            $sbj = $namesurname.' - '.Input::get('subject');
            
            Mail::send($messageTemplate, $maildata, function($m) use($dest_mail,$name_to,$sbj)
            {
                $m->to($dest_mail, $name_to)->subject($sbj);
            });
            
            $this->layout = View::make('helpdesk.send_success');
        }

	}

}