<?php
/**
 * Plugin Name: wp-taxonomy
 * Description: Wordpress Custom Taxonomies
 */

if(!class_exists('Spyc')) {
  require_once('lib/spyc.php');
}

class ftTaxonomy {

  private $config = array();

  function __construct() {
    $this->config_path =   WP_CONTENT_DIR . '/taxonomy';

    // We want the init to run after the default 10 to give themes a chance to config
    add_action('init', array($this, 'init'), 20);
    
    // Allow theme to override config path
    add_action('ft_taxonomy_path', array($this, 'set_path'));

    $this->parse();
  }

  private function parse() {
    if(!file_exists($this->config_path)) {
      return false;
    }

    foreach (glob($this->config_path . "/**/*.yaml") as $filename) {
      $this->config[] = spyc_load_file($filename);
    }
  }

  function init() {
    foreach($this->config as $taxo) {
      register_taxonomy($taxo['slug'], $taxo['type'], $taxo);
    }
  }

  function set_path($path) {
    if(!file_exists($path)) {
      return false;
    }

    $this->config_path = $path;

    $this->parse();
  }
}

$ftTaxonomy = new ftTaxonomy;