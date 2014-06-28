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
			echo ('test');
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
		             	Session::put('role_promoter', $user['role']);
		                return Redirect::to('home_promoter');
		                break;
		             case 3:
		             	Session::put('role_advertiser', $user['role']);
		                return Redirect::to('home_advertiser');
		                break;
		             case 4:
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

		if (Input::has('c'))
		{

			$stats = DB::table('stats_community_click')->get();


			  $label = "{label:'click'}";
			  $s1 = "";
			   $ticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";



			  foreach ($stats as $elem) {
			    
				$s1 = '[['.$elem->cnt.' , \''. str_replace("'", "\'", $elem->description).'\' ]],'.$s1 ;

				
			   // $s1 = $s1 .' '.$elem->cnt.',';
			    
			   // $ticks = $ticks . "'".str_replace("'", "\'", $elem->description)."',";
			    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";

			  }



			  
			$stats = DB::table('stats_communities_by_day')->where('community_id', Input::get('c'))
			->orderby('anno','asc')->orderby('mese','asc')->orderby('giorno','asc')->get();


			  $label = "{label:'click'}";
			  $sl1 = "";
			   $lticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";


			  $label = true;
			  foreach ($stats as $elem) {
			    

				    $sl1 = ((strlen($sl1) > 0 )?$sl1.',':$sl1) .'  '.$elem->cnt.' ';
				    if ($label)
				    {
				    	$lticks = ((strlen($lticks) > 0 )?$lticks.',':$lticks)  . "'".str_replace("'", "\'", $elem->data_stat)."'";
				    	//$label = false;
				    } else
				    {

				    	$lticks = ((strlen($lticks) > 0 )?$lticks.',':$lticks)  . "''";
				    	$label = true;
				    }
				    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";
				    
				  }


				  $stats = DB::table('stats_offers_by_day')->where('id', Input::get('c'))
			->orderby('anno','asc')->orderby('mese','asc')->orderby('giorno','asc')->get();


			  $label = "{label:'click'}";
			  $sl2 = "";
			   $l2ticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";


			  $label = true;
			  foreach ($stats as $elem) {
			    

				    $sl2 = ((strlen($sl2) > 0 )?$sl2.',':$sl2) .'  '.$elem->cnt.' ';
				    if ($label)
				    {
				    	$l2ticks = ((strlen($l2ticks) > 0 )?$l2ticks.',':$l2ticks)  . "'".str_replace("'", "\'", $elem->data_stat)."'";
				    	//$label = false;
				    } else
				    {

				    	$l2ticks = ((strlen($l2ticks) > 0 )?$l2ticks.',':$l2ticks)  . "''";
				    	$label = true;
				    }
				    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";
				    
				  }

			  $data['community_name'] =  Community::getLabel(Input::get('c'));

			  $data['s1'] =  $s1;
			  $data['ticks'] =  $ticks;
			  $data['sl1'] =  $sl1;
			  $data['lticks'] =  $lticks;
			  $data['sl2'] =  $sl2;
			  $data['l2ticks'] =  $l2ticks;

		}

		else
		{

						

			$stats = DB::table('stats_community_click')->get();


			  $label = "{label:'click'}";
			  $s1 = "";
			   $ticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";


			  
			  foreach ($stats as $elem) {
			    

			    $s1 = '[['.$elem->cnt.' , \''. str_replace("'", "\'", $elem->description).'\' ]],'.$s1 ;
			    
			    //$ticks = $ticks . "'".str_replace("'", "\'", $elem->description)."',";
			    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";

			  }
			  
			$stats = DB::table('stats_all_communities_day')->get();


			  $label = "{label:'click'}";
			  $sl1 = "";
			  $lticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";
			  

			  $label = true;
			  foreach ($stats as $elem) {
			    

			    //$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'[ \''.$elem->data_stat.'\',  '.$elem->cnt.']  ';
			    
			  	$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'  '.$elem->cnt.' ';
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


			  $stats = DB::table('stats_all_offers_day')->get();


			  $label = "{label:'click'}";
			  $sl2 = "";
			  $l2ticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";
			  

			  $label = true;
			  foreach ($stats as $elem) {
			    

			    //$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'[ \''.$elem->data_stat.'\',  '.$elem->cnt.']  ';
			    
			  	$sl2 = ((strlen($sl2) > 1 )?$sl2.',':$sl2) .'  '.$elem->cnt.' ';
			    if ($label)
			    {
			    	$l2ticks = ((strlen($lticks) > 1 )?$l2ticks.',':$l2ticks)  . "'".str_replace("'", "\'", $elem->data_stat)."'";
			    	$label = false;
			    } else
			    {

			    	$l2ticks = ((strlen($l2ticks) > 1 )?$l2ticks.',':$l2ticks)  . "''";
			    	$label = true;
			    }
			    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";

			  }

			  $data['s1'] =  $s1;
			  $data['ticks'] =  $ticks;
			  $data['sl1'] =  $sl1;
			  $data['lticks'] =  $lticks;
			  $data['sl2'] =  $sl2;
			  $data['l2ticks'] =  $l2ticks;

		}






			$data['community_list'] = array(''=>Lang::get('generic.pleaseselect')) + Community::getAllList();
			$data['campaigns_list'] = DB::table('offers_active')->orderby('updated_at','desc')->take(5)->get();
			$this->layout = View::make('home.admin', $data);
		}else{
			return Redirect::action('HomeController@logout');
		}
	}
	public function home_promoter()
	{
		if(Role::isPromoter(Auth::user()->id)){
			$data['campaigns_list'] = DB::table('offers_active')->where('promo', Session::get('userid'))->orderby('updated_at','desc')->take(5)->get();
			


			if (Input::has('c'))
		{

			$stats = DB::table('stats_community_click')->get();


			  $label = "{label:'click'}";
			  $s1 = "";
			   $ticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";



			  foreach ($stats as $elem) {
			    
				$s1 = '[['.$elem->cnt.' , \''. str_replace("'", "\'", $elem->description).'\' ]],'.$s1 ;
			   // $s1 = $s1 .' '.$elem->cnt.',';
			    
			   // $ticks = $ticks . "'".str_replace("'", "\'", $elem->description)."',";
			    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";

			  }



			  
			$stats = DB::table('stats_communities_by_day')->where('community_id', Input::get('c'))
			->orderby('anno','asc')->orderby('mese','asc')->orderby('giorno','asc')->get();


			  $label = "{label:'click'}";
			  $sl1 = "";
			   $lticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";


			  $label = true;
			  foreach ($stats as $elem) {
			    

				    $sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'  '.$elem->cnt.' ';
				    if ($label)
				    {
				    	$lticks = ((strlen($lticks) > 1 )?$lticks.',':$lticks)  . "'".str_replace("'", "\'", $elem->data_stat)."'";
				    	//$label = false;
				    } else
				    {

				    	$lticks = ((strlen($lticks) > 1 )?$lticks.',':$lticks)  . "''";
				    	$label = true;
				    }
				    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";
				    
				  }


				  $stats = DB::table('stats_offers_by_day')->where('id', Input::get('c'))
			->orderby('anno','asc')->orderby('mese','asc')->orderby('giorno','asc')->get();


			  $label = "{label:'click'}";
			  $sl2 = "";
			   $l2ticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";


			  $label = true;
			  foreach ($stats as $elem) {
			    

				    $sl2 = ((strlen($sl2) > 1 )?$sl2.',':$sl2) .'  '.$elem->cnt.' ';
				    if ($label)
				    {
				    	$l2ticks = ((strlen($l2ticks) > 1 )?$l2ticks.',':$l2ticks)  . "'".str_replace("'", "\'", $elem->data_stat)."'";
				    	//$label = false;
				    } else
				    {

				    	$l2ticks = ((strlen($l2ticks) > 1 )?$l2ticks.',':$l2ticks)  . "''";
				    	$label = true;
				    }
				    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";
				    
				  }

			  $data['community_name'] =  Community::getLabel(Input::get('c'));

			  $data['s1'] =  $s1;
			  $data['ticks'] =  $ticks;
			  $data['sl1'] =  $sl1;
			  $data['lticks'] =  $lticks;
			  $data['sl2'] =  $sl2;
			  $data['l2ticks'] =  $l2ticks;

		}

		else
		{

						

			$stats = DB::table('stats_community_click')->get();


			  $label = "{label:'click'}";
			  $s1 = "";
			   $ticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";


			  
			  foreach ($stats as $elem) {
			    

			    $s1 = '[['.$elem->cnt.' , \''. str_replace("'", "\'", $elem->description).'\' ]],'.$s1 ;
			    
			    //$ticks = $ticks . "'".str_replace("'", "\'", $elem->description)."',";
			    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";

			  }
			  
			$stats = DB::table('stats_all_campaigns_promoter_day')->where('promoter_id', Session::get('userid') )->get();


			  $label = "{label:'click'}";
			  $sl1 = "";
			  $lticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";
			  

			  $label = true;
			  foreach ($stats as $elem) {
			    

			    //$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'[ \''.$elem->data_stat.'\',  '.$elem->cnt.']  ';
			    
			  	$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'  '.$elem->cnt.' ';
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


			  $stats = DB::table('stats_all_offers_day')->get();


			  $label = "{label:'click'}";
			  $sl2 = "";
			  $l2ticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";
			  

			  $label = true;
			  foreach ($stats as $elem) {
			    

			    //$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'[ \''.$elem->data_stat.'\',  '.$elem->cnt.']  ';
			    
			  	$sl2 = ((strlen($sl2) > 1 )?$sl2.',':$sl2) .'  '.$elem->cnt.' ';
			    if ($label)
			    {
			    	$l2ticks = ((strlen($lticks) > 1 )?$l2ticks.',':$l2ticks)  . "'".str_replace("'", "\'", $elem->data_stat)."'";
			    	$label = false;
			    } else
			    {

			    	$l2ticks = ((strlen($l2ticks) > 1 )?$l2ticks.',':$l2ticks)  . "''";
			    	$label = true;
			    }
			    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";

			  }

			  $data['s1'] =  $s1;
			  $data['ticks'] =  $ticks;
			  $data['sl1'] =  $sl1;
			  $data['lticks'] =  $lticks;
			  $data['sl2'] =  $sl2;
			  $data['l2ticks'] =  $l2ticks;

		}


			$data['community_list'] = array(''=>Lang::get('generic.pleaseselect')) + Community::getAllList();

			$this->layout = View::make('home.promoter',$data);

		}else{
			return Redirect::action('HomeController@logout');
		}
	}
	public function home_advertiser()
	{
		if(Role::isAdvertiser(Auth::user()->id)){


			$stats = DB::table('stats_offer_click')->where('user_created', Session::get('userid'))
			->orderby('cnt', 'desc')
			->get();


			  $label = "{label:'click'}";
			  $s1 = "";
			   $ticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";

			  $number = 0;
			  $offers = '';
			  if (count($stats) == 1 )
			  {

			  	$nooffer = 1;
			  	$offers = Offer::where('user_created' , Session::get('userid'))->pluck('description');


			  } else 	$nooffer = 2;

			  foreach ($stats as $elem) {
			    
			    $number = $elem->cnt;
			    //$offers = $elem->description;

			    $s1 = '[['.$elem->cnt.' , \''. $elem->description.'\' ]],'.$s1 ;
			    
			    //$ticks = $ticks . "'".str_replace("'", "\'", $elem->description)."',";
			    //$label = $label . "{label:'".str_replace("'", "\'", $elem->description)."'}, ";

			  }
			  
			$stats = DB::table('stats_campaigns_by_month')
			->where('user_created', Session::get('userid'))
			->orderby('mese', 'asc')->orderby('giorno', 'asc')->get();


			  $label = "{label:'click'}";
			  $sl1 = "";
			   $lticks = "";
			  $label = "{label:'".Lang::get('campaigns.view')."'},";


			  $label = true;
			  foreach ($stats as $elem) {
			    

			    //$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'[ \''.$elem->data_stat.'\',  '.$elem->cnt.']  ';
			    
			  	$sl1 = ((strlen($sl1) > 1 )?$sl1.',':$sl1) .'  '.$elem->cnt.' ';
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

			  $data['s1'] =  $s1;
			  $data['ticks'] =  $ticks;
			  $data['sl1'] =  $sl1;
			  $data['lticks'] =  $lticks;
			  $data['sl2'] =  $sl1;
			  $data['l2ticks'] =  $lticks;
			  $data['number'] =  $number;
			  $data['nooffer'] =  $nooffer;
			  $data['offers'] =  $offers;






			$data['campaigns_list'] = Campaign::where('user_created', Session::get('userid'))->take(5)->get();
			$this->layout = View::make('home.advertiser', $data);
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