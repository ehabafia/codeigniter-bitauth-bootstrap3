<?php

class MY_Model extends CI_Model
{
	public $table;
	public $debug;
	/* public $hashed_password; */
	
	function __construct()
	{
		parent::__construct();
	}
	
/****************************************
 *										*
 *			SELECT Statments			*
 *										*
 ****************************************/
	public function find($id = null,$id_name = null)
	{
		if($id){
			$result = $this->db->where(($id_name==null)?$this->table.'Id':$id_name, $id)->limit(1)->get($this->table)->row();
			$this->last_query();
			return $result;
		} else {
			$result = $this->db->get($this->table)->result();
			$this->last_query();
			return $result;
		}
	}

	public function find_array($id = null)
	{
		if($id){
			$result = $this->db->where($this->table.'Id', $id)->limit(1)->get($this->table)->row_array();
			$this->last_query();
			return $result;
		} else {
			$result = $this->db->get($this->table)->result_array();
			$this->last_query();
			return $result;
		}
	}

	public function find_by_column($column, $value, $order_by=NULL)
	{
		if(empty($order_by))
			$result = $this->db->where($column, $value)->get($this->table)->result();
		else
		{
			$this->db->order_by($order_by, 'asc');
			$query = $this->db->where($column, $value)->get($this->table);
			$result = $query->result();
		}
		$this->last_query();
		
		if(count($result) > 0) {return $result;} else {return false;}
	}
	
	public function find_by_column_row($column, $value)
	{
		$result = $this->db->where($column, $value)->get($this->table)->row();
		
		$this->last_query();
		
		if(count($result) > 0) {return $result;} else {return false;}
	}
	
	public function check($data){
		unset($data['submit']);
		foreach($data as $key => $value){
			$this->db->where($key, $value);
		}
		$result = $this->db->limit(1)->get($this->table)->row();
		$this->last_query();
		
		return $result;
	}

	public function get($columns, $firstOption, $order_by=NULL)
	{
		if(empty($order_by))
		{
			$result = $this->db->select($columns)->get($this->table)->result_array();
			$result_array[''] = $firstOption;
			foreach ($result as $row) {
				$result_array[$row['group_id']] = $row['name'];
			}
		}
		else
		{
			$this->db->order_by($order_by, 'asc');
			$result = $this->db->select($columns)->get($this->table)->result_array();
			$result_array[''] = $firstOption;
			foreach ($result as $row) {
				$result_array[$row['group_id']] = $row['name'];
			}
		}
		$this->last_query();
		
		if(count($result) > 0) {return $result_array;} else {return false;}
	}

/****************************************
*										*
*			INSERT Statments			*
*										*
****************************************/
	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

/****************************************
*										*
*			UPDATE Statments			*
*										*
****************************************/
	public function update($data, $fieldId){
		$this->db->where($this->table.'Id', $fieldId);
		$query = $this->db->update($this->table, $data);
		$this->last_query();
		if($query) return true;
		else return false;
	}
	
	
	
/****************************************
*										*
*			DELETE Statments			*
*										*
****************************************/
	public function delete($id)
	{
		$this->db->where($this->table.'Id', $id);
		$delete = $this->db->delete($this->table);
		$this->last_query();
		if($delete) return true;
		else return false;
	}


/****************************************
 *										*
*			Other Statments				*
*										*
****************************************/
	public function count_all()
	{
		return $this->db->count_all($this->table);
	}
	
	public function count($column, $value){
		$count = $this->db->where($column, $value)->count_all_results($this->table);
		$this->last_query();
		return $count;
	}
	
	public function last_query(){
		if($this->debug == true){
			 echo $this->db->last_query()."<br />";
		}
	}

	public function getMessage($message, $vars){
		$theMessage = "<div id = 'message'>".sprintf($message, $vars)."</div>";
		return $theMessage;
	}
}