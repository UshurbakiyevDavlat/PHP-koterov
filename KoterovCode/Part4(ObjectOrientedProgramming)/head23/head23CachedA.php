<?php

    require_once("head23PageA.php");

    abstract class Cached extends Page{
        protected $expires;
        protected $store;

        abstract public function id ($name);
    }

?>