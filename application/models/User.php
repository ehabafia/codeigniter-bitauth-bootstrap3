<?php

class User extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->table = 'bitauth_users';
		$this->debug = false;
	}

	/**
	 * Bitauth::get_users()
	 *
	 * Get all users
	 */
	public function getUsers($include_disabled = FALSE)
	{
		if( ! $include_disabled)
		{
			$this->db->where('users.enabled', 1);
		}
		/* $this->db->where('bitauth_groups.roles', 10); */
		$query = $this->db
		->select('users.*')
		->select('userdata.*')
		->select('GROUP_CONCAT(assoc.groupId SEPARATOR "|") AS groups')
		->select('GROUP_CONCAT(groups.roles SEPARATOR "|") AS roles')
		->join('bitauth_userdata'.' userdata', 'userdata.userId = users.userId', 'left')
		->join('bitauth_assoc'.' assoc', 'assoc.userId = users.userId', 'left')
		->join('bitauth_groups'.' groups', 'groups.groupId = assoc.groupId', 'left')
		->where('roles', 10)
		->or_where('roles', 100)
		->or_where('roles', 1)
		->group_by('users.userId')
		->get('bitauth_users'.' '.$this->db->dbprefix.'users');

		if($this->debug)echo $this->db->last_query()."<br />";
		if($query && $query->num_rows())
		{
			$ret = array();
			$result = $query->result();
			foreach($result as $row)
			{
				$roles = 0;
				$row->groups = explode('|', $row->groups);
				if( ! empty($row->roles))
				{
					$this->_or_bits($roles, explode('|', $row->roles));
				}
				$row->roles = $roles;
				$row->last_login_ip = long2ip($row->last_login_ip);
	
				$ret[] = $row;
			}
	
			return $ret;
		}
	
		return FALSE;
	}
	
	/* Bitauth::_or_bits()
	*
	*/
	protected function _or_bits(&$mask, $set)
	{
		if(is_array($set))
		{
			foreach($set as $_set)
			{
				$this->_or_bits($mask, $_set);
			}
	
			return TRUE;
		}
	
		$bits = $this->_find_bits(trim($set));
		foreach($bits as $_offset)
		{
			$this->_set_bit($mask, $_offset);
		}
	
		return TRUE;
	}
	
	/**
	 * Bitauth::_set_bit()
	 *
	 */
	protected function _set_bit(&$mask, $idx)
	{
		if(is_array($idx))
		{
			foreach($idx as $_idx)
			{
				$this->_set_bit($mask, $_idx);
			}
	
			return TRUE;
		}
	
		$idx++;
	
		if(strlen($mask) < $idx)
		{
			$mask = str_pad($mask, $idx, '0', STR_PAD_LEFT);
		}
	
		$mask = substr_replace($mask, '1', '-'.$idx, 1);
	}
	
	/**
	 * Bitauth::_check_bit()
	 *
	 */
	protected function _check_bit($mask, $idx)
	{
		return strlen($mask) > $idx && (substr($mask, '-'.++$idx, 1) === '1');
	}
	
	/**
	 * Bitauth::_find_bits()
	 *
	 */
	protected function _find_bits($string, $find = '1')
	{
		$ret = array();
		$string = strrev($string);
	
		for($i = 0; $i < strlen($string); $i++)
		{
		if(substr($string, $i, 1) === '1')
		{
		$ret[] = $i;
		}
		}
	
		return $ret;
	}
	
	public function updateUserStatus(){
		
		$fieldName = 'enabled';
		$table = 'bitauth_users';
		$user_id = $this->input->post('user_id');
		$value = $this->input->post('flag');
		
		switch ($this->input->post('action')){
			case 'block':
				$class = "unblockUser";
				$message = t('unblockUser');
				break;
			case 'unblock':
				$class = "blockUser";
				$message = t('blockUser');
				break;
			default:
				$class = 'error';
				$message = t('errorMessage');
		}

		$this->db->where('user_id', $user_id);
		$query = $this->db->update($table, array($fieldName => $value));
		
		$this->last_query();
		
		if($query) {
			$return['user_id'] = $user_id;
			$return['fieldName'] = $fieldName;
			$return['flag'] = $value;
			$return['hclass'] = $class;
			$return['status'] = 'success';
			$return['message'] = $message;
			echo json_encode($return);
		} else {
			$return['user_id'] = $user_id;
			$return['fieldName'] = $fieldName;

			$return['status'] = 'fail';
			echo json_encode($return);
		}
		
		
	}
	
	public function deleteUser(){
	
		if($this->input->is_ajax_request() == TRUE){
			$user_id = $this->input->post('user_id');
			/* $action = $this->input->post('action'); */
			
			$tables = array('bitauth_users', 'bitauth_userdata', 'bitauth_logins', 'bitauth_assoc');
			$this->db->where('user_id', $user_id);
			$delete = $this->db->delete($tables);
			
			$this->last_query();
			
			$return['user_id'] = $user_id;
			$return['status'] = 'success';
			$return['message'] = t('accountDeleted');
			$return['delete'] = $delete;
			echo json_encode($return);
		}
	}	
}