<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Codeigniter Multilevel menu Class
 * Provide easy way to render multi level menu
 * 
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Eding Muhamad Saprudin 
 */
class Multi_menu {

	private $first_tag_open    = '<ul class="nav">';
	private $full_tag_open     = '<ul>';
	private $full_tag_close    = '</ul>';	
	private $item_tag_open     = '<li>';
	private $item_tag_close    = '</li>';
	private $active_item_class = '<li class="active">';
	private $active_item       = '';
	private $anchor_item       = '<a href="%s">%s</a>';
	private $menu_id           = 'id';
	private $menu_label        = 'name';
	private $menu_key          = 'key';
	private $menu_parent       = 'parent';
	private $menu_children     = 'children';


	public function __construct($config = array())
	{
		$ci =& get_instance();
		$ci->load->helper('url');
		
		$this->initialize($config);
	}

	public function initialize($config)
	{
		foreach ($config as $key => $value) {
			$this->$key = $value;
		}
	}

	/**
     * Render the menu
     *
     * @param  array  $items        array data
     * @param  boolean $render      direct render or not, default is direct render     
     * @return string               html menu
     */
    public function render($items, $active = "", $render = true)
    {
		$html  = "";
		$items = $this->prepare_items($items);

        $this->render_item($items, $active, $html);        

        if ($render) echo $html;
        else return $html;
    } 

    private function prepare_items($data = array())
    {
    	$items = array();

		foreach ($data as $item) 
		{
			if ($item[$this->menu_parent] == $parent) 
			{
				$items[$item[$this->menu_id]] = $item;
				$items[$item[$this->menu_id]][$this->menu_children] = $this->prepare_items($data, $item[$this->menu_id]);
			}	
		}

		return $items;
    }

    private function render_item($items, $active, &$html = '')
	{	    
	    $html .= empty($html) ? $this->first_tag_open : $this->full_tag_open; 
	  
	    foreach ($items as $item)
	    {
	        // menu label
	        $label = $item[$this->menu_label];
	        // menu slug
	        $slug  = $item[$this->menu_key];

	        // has children or not
	        $has_children = ! empty($item[$this->menu_children]);
	        $href = $has_children ? '#' : site_url($slug);

	        $html .= $active == $slug ? $this->active_item_class : $this->item_tag_open; 
	        
	        $anchor_item = isset($this->{'anchor_item_' . $slug}) ? $this->{'anchor_item_' . $slug} : $this->anchor_item;
	        $html .= sprintf($anchor_item, $href, $label);
	        
	        if ( $has_children ) {
	            render_item($item[$this->menu_children], $html);
	        }

	        $html .= $this->item_tag_close; 
	    }
	    
	    $html .= $this->full_tag_close; 
	}

}