<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends MY_Controller {
	public function index(){
		$this->twig->display('aplikasi/beranda');
	}
}
