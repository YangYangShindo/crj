<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//首页网站
	public function index()
	{
		$this->load->helper('form');
		$this->load->view('user/home.html');

		// echo "Hello";
	}
	
	//用户登录后主页
	public function user(){

		$this->load->view('user/main.html');

	}

	//新办证件
	public function xbzj() {

		$this->load->view('user/xbzj.html');


	}

	//显示证件办理内容
	public function show(){

		$this->load->view('user/show.html');



	}

	//显示列表
	public function showlist(){

		$this->load->view('user/list.html');



	}
}
