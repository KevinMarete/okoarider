<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function create_user($account_data){
		$response = array();
		try{
			$uuid = $account_data['uuid'];
			$result_data = $this->db->get_where('tbl_profile', array('uuid' => $uuid))->row_array();
			if(!empty($result_data)){
				$this->db->update('tbl_profile', $account_data, array('uuid' => $uuid));
				$response['message'] = 'Existing Account has been updated';
			}else{
				$this->db->insert('tbl_profile', $account_data);
				$response['message'] = 'New Account has been created';
			}
			$response['status'] = TRUE;
			$response['uuid'] = $uuid;
		}catch(Execption $e){
			$response['status'] = FALSE;
			$response['message'] = $e->getMessage();
		}
		return $response;
	}

	public function create_token($token_data){
		$response = array();
		try{
			$uuid = $token_data['uuid'];
			$result_data = $this->db->get_where('tbl_token', array('uuid' => $uuid))->row_array();
			if(!empty($result_data)){
				$this->db->update('tbl_token', $token_data, array('uuid' => $uuid));
				$response['message'] = 'Token was updated';
			}else{
				$this->db->insert('tbl_token', $token_data);
				$response['message'] = 'Token was created';
			}
			$response['status'] = TRUE;
		}catch(Execption $e){
			$response['status'] = FALSE;
			$response['message'] = $e->getMessage();
		}
		return $response;
	}

	public function verify($account_data){
		$response = array();
		$this->db->select('p.uuid,p.first_name, p.last_name, p.email, p.promo_code, t.access_token, t.expires_in');
		$this->db->from('tbl_profile p');
		$this->db->join('tbl_token t', 't.uuid = p.uuid', 'left');
		$query = $this->db->get_where('tbl_profile', $account_data);
		$result = $query->row_array();

		if(empty($result)){
			$response['status'] = FALSE;
			$response['data'] = 'Account does not exit';
		}else if(!$result['access_token'] || time() > $result['expires_in']){
			$response['status'] = FALSE;
			$response['data'] = '<br/>Access Token is missing or expired<br/> Sign in using Uber';
		}else{
			$response['status'] = TRUE;
			$response['data'] = $result;
		}
		return $response;
	}

	public function create_history($history_data){
		$response = array();
		try{
			$request_id = $history_data['request_id'];
			$result_data = $this->db->get_where('tbl_history', array('request_id' => $request_id))->row_array();
			if(!empty($result_data)){
				$this->db->update('tbl_history', $history_data, array('request_id' => $request_id));
				$response['message'] = 'Profile history was updated';
			}else{
				$this->db->insert('tbl_history', $history_data);
				$response['message'] = 'Profile history was added';
			}
			$response['status'] = TRUE;
		}catch(Execption $e){
			$response['status'] = FALSE;
			$response['message'] = $e->getMessage();
		}
		return $response;
	}

}