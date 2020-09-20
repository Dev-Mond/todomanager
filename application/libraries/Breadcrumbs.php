<?php
 defined("BASEPATH") OR exit("No direct script access allowed!");

 class Breadcrumbs {

    public $active;

    public $links = array();

    private $ci;

    public function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->library('breadcrumbsLinks');
        $this->links = array();
    }

    public function add($linkName, $linkUrl) {
        $this->ci->breadcrumbsLinks = new BreadcrumbsLinks();
        $this->ci->breadcrumbsLinks->set($linkName, $linkUrl);
        array_push($this->links, $this->ci->breadcrumbsLinks);
    }

    public function setActive($activeLink) {
        $this->active = $activeLink;
    }
 }