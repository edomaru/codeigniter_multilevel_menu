<?php
class Menu_model extends CI_Model {

	public function all()
	{
		$this->db->get("menu");
	}

	public function generate($max = 5, $parent = null)
	{		
		if (is_null($parent))
			$this->db->where("parent is null");
		else	
			$this->db->where("parent", $parent);
		$query = $this->db->get("menus");

		if ($query->num_rows() < 1)
		{			
			for ($i=0; $i < $max; $i++) 
			{ 				
				$this->save($i);
			}			
		}
		else 
		{			
			foreach ($query->result() as $index => $row) 
			{
				for ($i=0; $i < rand(1, 3); $i++) 
				{ 				
					$this->save($i, $row->id);
				}
			}
		}
	}

	private	function save($index, $parent = null)
	{
		$item_num = array($parent);
		$item_num[] = $index;

		$name = "Item " . ltrim(implode(".", $item_num), ".");	

		$this->db->insert("menus", array(
			'name'   => $name,
			'parent' => $parent,
			'slug'   => url_title($name),
			'number' => $this->last_number($parent)
		));

		$new_parent = $this->db->insert_id();
	}

	private function last_number($parent = null)
	{
		$this->db->select_max("number");
		$this->db->where("parent", $parent);
		return $this->db->get("menus")->row()->number + 1;
	}
}