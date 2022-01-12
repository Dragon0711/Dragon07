<?php

namespace App\Http\Interfaces;


Interface ContactInterface{

public function contact();

public function ContactForm($request);

/****
* For Admin
 *****/
public function mailBox();

public function viewMessage($request);




}
