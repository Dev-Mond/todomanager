<?php
 defined("BASEPATH") OR exit("No direct script access allowed!");

 class BreadcrumbsLinks {

    public $name;

    public $url;

    public function set($linkName, $linkUrl) {

        $this->name = $linkName;
        
        $this->url = $linkUrl;
    }
 }