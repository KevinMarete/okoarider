<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MX_Controller 
{

	public function index()
	{	
		if($this->input->get('code'))
		{	
			//Get access data
			$access = $this->get_access($this->input->get('code'));
			$access_data = $access['data'];
			if(!isset($access_data['error'])){
				//Get profile
				$header_data = array(
					'Authorization: Bearer '.$access_data['access_token'], 
					'Accept-Language: en_US',
					'Content-Type: application/json'
				);
				$profile = $this->curl_get($this->config->item('profile_url'), $header_data);
				if(!$profile['error'])
				{
					//Save profile data
					$profile_data = $profile['data'];
					$user_response = $this->user_model->create_user($profile_data);
					//Save token data
					if($user_response['status']){
						$access_data['uuid'] = $user_response['uuid'];
						$token_response = $this->user_model->create_token($access_data);
						if($token_response['status']){
							//Save in session and go to home
							$session_data = array();
							$session_data['uuid'] = $user_response['uuid'];
							$session_data['first_name'] = $profile_data['first_name'];
							$session_data['last_name'] = $profile_data['last_name'];
							$session_data['email'] = $profile_data['email'];
							$session_data['promo_code'] = $profile_data['promo_code'];
							$session_data['access_token'] = $access_data['access_token'];
							$session_data['expires_in'] = $access_data['expires_in'];
							$this -> session -> set_userdata($session_data);
							redirect('home');
						}
					}
				}
			}
		}	
		//Build error message and send as flash_message
		$message = '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Error!</strong> Access Code is missing</div>';
		$this->session->set_flashdata('login_msg', $message);
		redirect('login');
	}

	public function get_access($auth_code)
	{	
		$post_data = array(
			'client_id' => $this->config->item('client_id'),
			'client_secret' => $this->config->item('client_secret'),
			'grant_type' => 'authorization_code',
			'redirect_uri' => $this->config->item('redirect_uri'),
			'code' => $auth_code,
			'scope' => $this->config->item('scope')
		);

		return $this->curl_post($this->config->item('token_url'), $post_data);
	}

	public function login()
	{	
		$data['auth_request_url'] = $this->config->item('auth_request_url');
		$this->load->view('login_view', $data);
	}

	public function register()
	{	
		$data['auth_request_url'] = $this->config->item('auth_request_url');
		$this->load->view('register_view', $data);
	}

	public function profile()
	{
		$data['content_view'] = 'user/profile_view';
		$data['page_title'] = 'OkoaRider | Profile';
		$this->load->view('template/dashboard_view', $data);
	}

	public function logout()
	{
		$this -> session -> sess_destroy();
		redirect("login");
	}

	public function authenticate()
	{	
		$post_data = array();
		$post_data['p.email'] = $this -> input -> post('email');
		$post_data['p.password'] = md5($this -> encrypt -> get_key().$this -> input -> post('password'));
		$response = $this->user_model->verify($post_data);
		if($response['status'] == 0){
			//Build error message and send as flash_message
			$message = '<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Error!</strong> '.$response['data'].'</div>';
			$this->session->set_flashdata('login_msg', $message);
			redirect('login');
		}
		//Save data in session and go to home
		$this -> session -> set_userdata($response['data']);
		redirect('home');
	}

	public function create_account()
	{	
		$post_data = $this->input->post();
		if(!empty($post_data))
		{
			//Check if terms are ok
			if($post_data['terms'] == 'on'){
				//Check if password matches confirmed_password
				if($post_data['password'] == $post_data['confirm_password']){
					//Build the new account
					$name = explode(' ', $post_data['full_name'], 2);
					$account_data['first_name'] = $name[0];
					$account_data['last_name'] = $name[1];
					$account_data['email'] = $post_data['email'];
					$account_data['password'] = md5($this -> encrypt -> get_key().$post_data['password']);
					//Create account
					$response = $this->user_model->create_user($account_data);
					$message = $response['message']; 
					if($response['status']){
						//Build success message and send as flash_message
						$message = '<div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<strong>Success!</strong> '.$message.'</div>';
						$this->session->set_flashdata('login_msg', $message);
						//Go to Login
						redirect('login');
					}
				}else{
					$message = 'Ensure that your password matches the confirmed password';
				}
			}else{
				$message = 'Ensure that you have accepted the terms before creating an account';
			}
		}else{
			$message = 'Invalid submission';
		}
		//Build error message and send as flash_message
		$message = '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Error!</strong> '.$message.'</div>';
		$this->session->set_flashdata('register_msg', $message);
		//Go to register
		redirect('register');
	}

	public function home()
	{	
		$all_history = array();
		//Get history
		$header_data = array(
			'Authorization: Bearer '.$this->session->userdata('access_token'), 
			'Accept-Language: en_US',
			'Content-Type: application/json'
		);
		$histories = $this->curl_get($this->config->item('history_url'), $header_data);
		if(!$histories['error']){
			$counter = 0;
			$total_count = $histories['data']['count'];
			$batch_count = sizeof($histories['data']['history']);

			while($counter < $total_count){
				if($counter > 0){
					//Use offset for history get url
					$histories = $this->curl_get($this->config->item('history_url').'&offset='.$counter, $header_data);
				}

				//Save histories data
				if(!$histories['error']){
					foreach ($histories['data']['history'] as $history) {
						$history_data = array(
							'status' => $history['status'],
							'distance' => $history['distance'],
							'request_time' => $history['request_time'],
							'start_time' => $history['start_time'],
							'start_city_name' => $history['start_city']['display_name'],
							'start_city_latitude' => $history['start_city']['latitude'],
							'start_city_longitude' => $history['start_city']['longitude'],
							'end_time' => $history['end_time'],
							'product_id' => $history['product_id'],
							'request_id' => $history['request_id'],
							'uuid' => $this->session->userdata('uuid')
						);
						$response = $this->user_model->create_history($history_data);
						$all_history[] = $history_data;
					}
				}

				//Increment counter
				$counter += $batch_count;
			}

			//Profile user

		}
		$data['histories'] = $all_history;
		$data['content_view'] = 'user/history_view';
		$data['page_title'] = 'OkoaRider | History';
		$this->load->view('template/dashboard_view', $data);
	}

	public function curl_post($url, $post_data){
		$response_data = array();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$response = curl_exec($ch);

		if (empty($response)) {
			$response_data['error'] = TRUE;
			$response_data['data'] = json_decode(curl_error($ch), TRUE);
		}else{
			$response_data['error'] = FALSE;
			$response_data['data'] = json_decode($response, TRUE);
		}

		curl_close($ch);

		return $response_data;
	}

	public function curl_get($url, $header_data){
		$response_data = array();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header_data);
		$response = curl_exec($ch);

		if (empty($response)) {
			$response_data['error'] = TRUE;
			$response_data['data'] = json_decode(curl_error($ch), TRUE);
		}else{
			$response_data['error'] = FALSE;
			$response_data['data'] = json_decode($response, TRUE);
		}

		curl_close($ch);

		return $response_data;
	}

}