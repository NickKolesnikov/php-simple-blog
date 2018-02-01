<?php

class ViewGenerator
{
    protected $_path;
    public $_var = array();

    public function __construct($path) {
        $this->_path = $path;
    }
  
    public function assign($name, $value='') {
        if (is_array($name)) foreach($name as $k=>$v) $this->_var[$k] = $v;
        else $this->_var[$name] = $value;
    }
  
    public function fetch($template, $params=array()) {
        if (is_array($params) && sizeof($params)>0) {
            $this->assign($params);
        }
        $this->_template = $this->_path . $template;
        if (!file_exists($this->_template)) {
            return 'Template not found: ' . $this->_template.'<br />';
        }
        else {
            ob_start();
            extract($this->_var);
            include($this->_template);
            return ob_get_clean();
        }
    }
  
    public function display($template,$p=array() ) {
        echo $this->fetch($template, $p);
    }
}
