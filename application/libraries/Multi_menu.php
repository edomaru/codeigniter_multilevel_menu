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

	/**
	 * Tag opener of the navigation menu
	 * default is '<ul>' tag
	 * 
	 * @var string
	 */
	private $nav_tag_open             = '<ul>';

	/**
	 * Closing tag of the navigation menu
	 * default is '</ul>'
	 * 
	 * @var string
	 */
	private $nav_tag_close            = '</ul>';	

	/**
	 * Tag opening tag of the menu item
	 * default is '</li>'
	 * 
	 * @var string
	 */
	private $item_tag_open            = '<li>';

	/**
	 * Closing tag of the menu item
	 * default is '</li>'
	 * 
	 * @var string
	 */
	private $item_tag_close           = '</li>';

	/**
	 * Opening tag of the menu item that has children
	 * default is '</li>'
	 * 
	 * @var string
	 */
	private $parent_tag_open          = '<li>';

	/**
	 * Closing tag of the menu item that has children
	 * default is '</li>'
	 * 
	 * @var string
	 */
	private $parent_tag_close         = '</li>';

	/**
	 * Anchor tag of the menu item that has children
	 * default is '<a href="%s">%s</a>'
	 * 
	 * @var string
	 */
	private $parent_anchor            = '<a href="%s">%s</a>';

	/**
	 * Opening tag of the menu item level one that has children
	 * if not definied or empty, it would use $parent_tag_open
	 * 
	 * @var string
	 */
	private $parentl1_tag_open        = '';

	/**
	 * Closing tag of the menu item level one that has children
	 * if not definied or empty, it would use $parent_tag_close
	 * 
	 * @var string
	 */
	private $parentl1_tag_close       = '';

	/**
	 * Anchor tag of the menu item level one that has children
	 * if not definied or empty, it would use $parent_anchor
	 * 
	 * @var string
	 */
	private $parentl1_anchor          = '';

	/**
	 * Opening tag of the children menu / sub menu.
	 * Default is '<ul>'
	 * 
	 * @var string
	 */
	private $children_tag_open        = '<ul>';

	/**
	 * Closing tag of the children menu / sub menu.
	 * Default is '<ul>'
	 * 
	 * @var string
	 */
	private $children_tag_close       = '</ul>';

	/**
	 * The active item class
	 * Default is 'active'
	 * 
	 * @var string
	 */
	private $item_active_class        = 'active';	

	/**
	 * The item that has active class.
	 * Please specify the menu slug here
	 * 
	 * @var string
	 */
	private $item_active              = '';	

	/**
	 * Anchor tag of the menu item.
	 * Default is '<a href="%s">%s</a>'
	 * 
	 * @var string
	 */
	private $item_anchor              = '<a href="%s">%s</a>';

	/**
	 * The list of menu items that has divider
	 * 
	 * @var string
	 */
	private $divided_items_list       = array();

	/**
	 * number of the items that has divider
	 * 
	 * @var string
	 */
	private $divided_items_list_count = 0;

	/**
	 * Divider of the item
	 * ex: '<li class="divider"></li>'
	 * 
	 * @var string
	 */
	private $item_divider             = '';

	/**
	 * Array key that holds Menu id
	 * Ex: $items['id'] = 1
	 * 
	 * @var string
	 */
	private $menu_id                  = 'id';

	/**
	 * Array key that holds Menu label
	 * Ex: $items['name'] = "Something"
	 * 
	 * @var string
	 */
	private $menu_label               = 'name';	

	/**
	 * Array key that holds Menu key/ menu slug
	 * Ex: $items['key'] = "something"
	 * 
	 * @var string
	 */
	private $menu_key                 = 'key';

	/**
	 * Array key that holds Menu parent
	 * Ex: $items['parent'] = 1
	 * 
	 * @var string
	 */
	private $menu_parent              = 'parent';	

	/**
	 * Array key that holds Menu Ordering
	 * Ex: $items['order'] = 1
	 * 
	 * @var string
	 */
	private $menu_order               = 'order';	

	/**
	 * Array key that holds Menu Icon
	 * Ex: $items['icon'] = "fa fa-list"
	 * 
	 * @var string
	 */
	private $menu_icon               = 'icon';

	/**
	 * Position of the menu icon
	 * left or right
	 * 
	 * @var string
	 */
	private $icon_position           = 'left';

	/**
	 * Base url of the image icon (draft)
	 * It would be use codeigniter base url if not define
	 * Ex: http://localhost/assets/img
	 * 
	 * @var string
	 */
	private $icon_img_base_url       = null;

	/**
	 * List of the menus icon
	 * 
	 * @var string
	 */
	private $menu_icons_list         = null;

	/**
	 * Store additional menu items
	 * 
	 * @var string
	 */
	private $_additional_item        = array();

	/**
	 * Uri segment
	 * 
	 * @var int
	 */
	private $uri_segment             = 1;
	

	/**
	 * load configuration on config/multi_menu.php
	 * 
	 * @param array $config 
	 */
	public function __construct($config = array())
	{
		// just in case url helper has not load yet
		$this->ci =& get_instance();
		$this->ci->load->helper('url');

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
		if ( count($items) ) 
		{
			$this->divided_items_list       = $items;
			$this->item_divider             = $divider ? $divider : $this->item_divider;
			$this->divided_items_list_count = count($this->divided_items_list);
		}
	}

	/**
     * Render the menu
     *
     * @param  boolean 	$config      			configuration of the library. if not defined would use default config.
     *                                  		It also possible to define active item of the menu here with string value.
     * @param  array 	$divided_items_list 	menu items that would be divided   
     * @param  string 	$divider 				divider item
     * @return string               
     */
    public function render($config = array(), $divided_items_list = array(), $divider = '')
    {
		$html  = "";

		if ( is_array($config) ) {
			$this->initialize($config);	
		}
		elseif (is_string($config)) {
			$this->item_active = $config;
		}

    	if ( count($this->items) ) 
    	{
			$items = $this->prepare_items($this->items);		

			$this->set_divided_items($divided_items_list, $divider);

	        $this->render_item($items, $html);
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
				$items[$item[$this->menu_id]]['children'] = $this->prepare_items($data, $item[$this->menu_id]);
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
     * @param  array  $items  consructed data
     * @param  string &$html  html menu
     * @return void         
     */
    private function render_item($items, &$html = '')
	{	    
	    if ( empty($html) ) 
	    {
	    	$nav_tag_opened = true;
			$html .= $this->nav_tag_open;

			// check is there additiona menu item for the the first place
			if ( ! empty($this->_additional_item['first'])) {
				$html .= $this->_additional_item['first'];
			}
		}		
		else {
	    	$html .= $this->children_tag_open; 
		}		
	  
	    foreach ($items as $item)
	    {
	        // menu label
	        if ( isset($item[$this->menu_label], $item[$this->menu_key]) ) 
	        {
		        $label = $item[$this->menu_label];

		        // icon
		        $icon  = empty($item[$this->menu_icon]) ? '' : $item[$this->menu_icon];
		        if ( isset($this->menu_icons_list[($item[$this->menu_key])]) ) {
		        	$icon = $this->menu_icons_list[($item[$this->menu_key])];
		        }		        

		        if ($icon) 
		        {
		        	$icon = "<i class='{$icon}'></i>";
		        	$label = trim( $this->icon_position == 'right' ? ($label . " " . $icon ) : ($icon . " " . $label) );
		        }


		        // menu slug
		        $slug  = $item[$this->menu_key];

		        // has children or not
		        $has_children = ! empty($item['children']);	        

		        // if menu item need separator 
		        if ($this->divided_items_list_count > 0 && in_array($slug, $this->divided_items_list)) {
		        	$html .= $this->item_divider;	
		        }

		        if ($has_children) 
		        {
		        	if ( is_null($item[$this->menu_parent]) && $this->parentl1_tag_open != '' ) 
		        	{
						$tag_open    =  $this->parentl1_tag_open;
						$item_anchor = $this->parentl1_anchor != '' ? $this->parentl1_anchor : $this->parent_anchor;
		        	}
		        	else 
		        	{
						$tag_open     = $this->parent_tag_open;
						$item_anchor = $this->parent_anchor;
		        	}

					$href  = '#';				
		        }
		        else 
		        {
		        	$tag_open    = $this->item_tag_open;
					$href        = site_url($slug);
					$item_anchor = $this->item_anchor;
		        }

				$html .= $this->set_active($tag_open, $slug);	        	        

				if (substr_count($item_anchor, '%s') == 2) {
					$html .= sprintf($item_anchor, $href, $label);
				}
				else {
					$html .= sprintf($item_anchor, $label);	
				}

		        if ( $has_children ) 
		        {	        	
		            $this->render_item($item['children'], $html);

		            if ( is_null($item[$this->menu_parent]) && $this->parentl1_tag_close != '' ) {
		        		$html .= $this->parentl1_tag_close;
		        	}
		        	else {
						$html  .= $this->parent_tag_close;
		        	}	            
		        }
		        else {
		        	$html .= $this->item_tag_close; 
		        }

	        }
	    }
	    
	    if (isset($nav_tag_opened)) 
	    {
	    	if ( ! empty($this->_additional_item['last'])) {
				$html .= $this->_additional_item['last'];
			}

	    	$html .= $this->nav_tag_close; 
	    }
	    else {	   
	    	$html  .= $this->children_tag_close;
	    }
	}

	/**
	 * Inject item to menu
	 * Call this method before render method call
	 * 
	 * @param  string $item     menu item that would be injected
	 * @param  string $position position where the additiona menu item would be placed (fist or last)
	 * @return Multi_menu           
	 */
	public function inject_item($item, $position = null)
	{
		if (empty($position)) {
			$position = 'last';
		}

		$this->_additional_item[$position] = $item;

		return $this;
	}

	/**
	 * Set active item
	 * 
	 * @param string $html html tag that would be injected
	 * @param string $slug html tag that has injected with active class
	 */
	private function set_active($html, $slug)
	{
		$segment = $this->ci->uri->segment($this->uri_segment);

		if ( ($this->item_active != '' && $slug == $this->item_active && empty($segment)) || $slug == $segment) 
		{
			$doc = new DOMDocument();
			$doc->loadHTML($html);
			foreach($doc->getElementsByTagName('*') as $tag ){
				$tag->setAttribute('class', ($tag->hasAttribute('class') ? $tag->getAttribute('class') . ' ' : '') . $this->item_active_class);
			}

			return preg_replace('~<(?:!DOCTYPE|/?(?:html|body))[^>]*>\s*~i', '', $doc->saveHTML() );
		}

		return $html;
	}

}