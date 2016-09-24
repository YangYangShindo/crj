<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	//后台首页
	public function index()
	{
		$this->load->view('admin/index.html');
		 //echo "Hello";
	}
	public function t1()
	{
		$this->load->view('admin/header.html');
		$this->load->view('admin/sider_left.html');
		$this->load->view('admin/sider_top.html');
		$this->load->view('admin/mid.html');
		$this->load->view('admin/footer.html');
		 //echo "Hello";
	}
	public function lqzj()
	{
		$this->load->view('admin/header.html');
		$this->load->view('admin/sider_left.html');
		$this->load->view('admin/sider_top.html');
		$this->load->view('admin/lqzj.html');
		$this->load->view('admin/footer_lo.html');
		 //echo "Hello";
	}

}