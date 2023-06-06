<?php

require_once 'app/models/lib/database';

class HomeController
{
    public function index()
    {
       $insert_us = insert();
       echo $insert_us; 
    }
}

