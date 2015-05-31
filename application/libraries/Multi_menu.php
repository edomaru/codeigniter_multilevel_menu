<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Codeigniter Multilevel menu Class
 * Provide easy way to render multi level menu
 * 
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Eding Muhamad Saprudin 
 * @link    		https://github.com/edomaru/codeigniter_multilevel_menu
 */
class Multi_menu {

	private $first_tag_open           = '<ul class="nav">';
	private $full_tag_open            = '<ul>';
	private $full_tag_close           = '</ul>';	
	private $item_tag_open            = '<li>';
	private $item_tag_close           = '</li>';
	private $active_item_class        = '<li class="active">';	
	private $anchor_item              = '<a href="%s">%s</a>';
	private $divided_items_list       = array();
	private $divided_items_list_count = 0;
	private $item_divider             = '';
	private $menu_id                  = 'id';
	private $menu_label               = 'name';
	private $menu_key                 = 'key';
	private $menu_parent              = 'parent';
	private $menu_children            = 'children';
	private $menu_order               = 'order';


	/**
	 * load configuration on config/multi_menu.php
	 * 
	 * @param array $config 
	 */
	public function __construct($config = array())
	{
		// just in case url helper has not load yet
		$ci =& get_instance();
		$ci->load->helper('url');

		$this->initialize($config);
	}

	/**
	 * Initialize multi level menu configuration
	 * 
	 * @param  array  $config multi level menu configuration
	 * @return void         
	 */
	public function initialize($config = array())
	{
		foreach ($config as $key => $value) {
			$this->$key = $value;
		}

		$this->divided_items_list_count = count($this->divided_items_list);
	}

	/**
	 * Specify what items would be divided
	 * 
	 * @param array  $items   array of menu key
	 * @param string $divider divider
	 */
	public function set_divided_items($items = array(), $divider = null)
	{
		$this->divided_items_list       = $items;
		$this->item_divider             = $divider ? $divider : $this->item_divider;
		$this->divided_items_list_count = count($this->divided_items_list);
	}

	/**
     * Render the menu
     *
     * @param  boolean 	$render      			direct render or not, default is direct render  
     * @param  array 	$divided_items_list 	menu items that would be divided   
     * @param  string 	$divider 				divider item
     * @return string               
     */
    public function render($active = "", $divided_items_list = array(), $divider = '')
    {
		$html  = "";

    	if ( count($this->items) ) 
    	{
			$items = $this->prepare_items($this->items);		

			$this->set_divided_items($divided_items_list, $divider);

	        $this->render_item($items, $active, $html);
    	}

        return $html;
    } 

    /**
     * Set array data
     * 
     * @param array $items data which would be rendered
     */
    public function set_items($items = array())
    {
    	$this->items = $items;
    }

    /**
     * Prepare item before render
     * 
     * @param  array 	$data   array data from active record result_array()
     * @param  int 		$parent parent of items
     * @return array         
     */
    private function prepare_items(array $data, $parent = null)
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

		// after items constructed
		// sort array by order 
		usort($items,array($this, 'sort_by_order'));

		return $items;
    }

    /**
     * Sort array by order
     * 
     * @param  array $a the 1st array would be compared
     * @param  array $b the 2nd array would be compared
     * @return int
     */
    private function sort_by_order($a, $b)
    {
    	return $a[$this->menu_order] - $b[$this->menu_order];
    }

    /**
     * Render data into menu items
     * 
     * @param  array $items  consructed data
     * @param  string $active item which would be active
     * @param  string &$html  html menu
     * @return void         
     */
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

	        if ($this->divided_items_list_count > 0 && in_array($slug, $this->divided_items_list)) {
	        	$html .= $this->item_divider;	
	        }

	        $html .= $active == $slug ? $this->active_item_class : $this->item_tag_open; 
	        
	        $anchor_item = isset($this->{'anchor_item_' . $slug}) ? $this->{'anchor_item_' . $slug} : $this->anchor_item;
	        $html .= sprintf($anchor_item, $href, $label);
	        
	        if ( $has_children ) {
	            $this->render_item($item[$this->menu_children], $active, $html);
	        }

	        $html .= $this->item_tag_close; 
	    }
	    
	    $html .= $this->full_tag_close; 
	}

}