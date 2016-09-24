<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	/**
	 * 用户表控制器，用于登录，修改资料等用户表操作
	 */

	/**
	 * 构造函数
	 */
	public function __construct(){

		parent::__construct();
		$this->load->model('YHZL_model','YHZL');
		$this->load->model('JTCY_model','JTCY');
		$this->load->model('CGJJL_model','CGJJL');

	}

	public function login(){

		/**
		 * 登录验证
		 */
		$this->load->library('form_validation');
		// $this->form_validation->set_rules('YHMM','密码','required');
		// $this->form_validation->set_rules('YHJH','警号','required');
		
		
		if ($this->form_validation->run('login') == FALSE)
		{
			
		    $this->load->view('user/home.html');
			$this->load->helper('form');
		}
		else
		{	
			$YHJH=$this->input->post('YHJH');
			$YHMM=$this->input->post('YHMM');


		    // $this->load->view('user/main.html');
		    
		    $row=array();
		    $row=$this->YHZL->check_login($YHJH);
		    
		    

		    if ($YHMM==$row['YHMM']) {
		    	// echo "success";
		    	
		    	//-left to done-
		    	//1.add session
		    	//2.check if first login,y(to filled up local info),n(to the main page)
		    	
		    	if ($row['YHZT']==0) {
		    		$url='user/first_add_info';

		    	}else{
		    		$url='home/user';
		    	}
		    	success($url,'登录成功！');
		    }else{
		    	error('警号或密码错误，请重新操作。');
		    }
		}

	}
	public function first_add_info(){
		$this->load->helper('form');

		$data['user_info']=$this->YHZL->get_user_info('052475');
		
		$this->load->view('user/first_add_info.html',$data);

	}
	public function update_info_01(){
		/**
		 * 个人资料完善提交第一步
		 */
		//$YHXB=$this->input->post('YHXB');
		$this->load->helper('form');
		$this->load->library('form_validation');

		
		if ($this->form_validation->run('update_info_01') == FALSE)
		{
			
		    
			$data['user_info']=$this->YHZL->get_user_info('052475');
			$this->load->view('user/first_add_info.html',$data);
			
		}
		else
		{	
			
			
			$data=array(

					'YHXB'=>$this->input->post('YHXB'),
					'YHCSNY'=>$this->input->post('YHCSNY'),
					'YHGZSJ'=>$this->input->post('YHGZSJ'),
					'YHHY'=>$this->input->post('YHHY'),
					'YHDW'=>$this->input->post('YHDW'),
					'YHZJ'=>$this->input->post('YHZJ'),
					'YHDH'=>$this->input->post('YHDH')
				);
			$this->YHZL->update_user_info($data,'052475');
			success('user/first_add_info_step2','更新成功，进入下一步！');
		}
	}

	public function first_add_info_step2(){
		/**
		 * 个人资料完善，第二步
		 */
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->view('user/first_add_info_step2.html');


	}

	public function update_info_02(){

		/**
		 * 更新用户家庭成员关系资料
		 */
		$this->load->helper('form');
		$this->load->library('form_validation');

		
		if ($this->form_validation->run('update_info_02') == FALSE)
		{
			
		    $this->load->view('user/first_add_info_step2.html');
			
		}
		else
		{	
			$CYTJ1=array(
					'YHJH'=>'052475',
					'CYGX'=>$this->input->post('CYGX1'),
					'CYXM'=>$this->input->post('CYXM1'),
					'CYNL'=>$this->input->post('CYNL1'),
					'CYDW'=>$this->input->post('CYDW1')



				);
			$CYTJ2=array(
					'YHJH'=>'052475',
					'CYGX'=>$this->input->post('CYGX2'),
					'CYXM'=>$this->input->post('CYXM2'),
					'CYNL'=>$this->input->post('CYNL2'),
					'CYDW'=>$this->input->post('CYDW2')



				);

			if (!empty($this->input->post('CYGX3'))){
				$CYTJ3=array(
					'YHJH'=>'052475',
					'CYGX'=>$this->input->post('CYGX3'),
					'CYXM'=>$this->input->post('CYXM3'),
					'CYNL'=>$this->input->post('CYNL3'),
					'CYDW'=>$this->input->post('CYDW3')


					);
				$CYTJ=array($CYTJ1,$CYTJ2,$CYTJ3);

			}else{
				$CYTJ=array($CYTJ1,$CYTJ2);
			}
		//批量插入数据
			$this->JTCY->insert_user_info_more($CYTJ);
			success('user/first_add_info_step3','更新成功，进入下一步！');
		
		}
		



	}
	public function first_add_info_step3(){

			/**
			 * 个人资料完善，第三步
			 */
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('user/first_add_info_step3.html');

	}

	public function update_info_03(){

		/**
		 * 增加出入境记录
		 */
		if ($this->input->post('SCSJ1')) {
			$CGJ1=array(
					'YHJH'=>'052475',
					'SCSJ'=>$this->input->post('SCSJ1'),
					'SMDD'=>$this->input->post('SMDD1'),
					'CXFS'=>$this->input->post('CXFS1')
				);
		}
		if ($this->input->post('SCSJ2')) {
			$CGJ2=array(
					'YHJH'=>'052475',
					'SCSJ'=>$this->input->post('SCSJ2'),
					'SMDD'=>$this->input->post('SMDD2'),
					'CXFS'=>$this->input->post('CXFS2')
				);
		}
		if ($this->input->post('SCSJ3')) {
			$CGJ3=array(
					'YHJH'=>'052475',
					'SCSJ'=>$this->input->post('SCSJ3'),
					'SMDD'=>$this->input->post('SMDD3'),
					'CXFS'=>$this->input->post('CXFS3')
				);
		}
		if (!empty($CGJ1)&&!empty($CGJ2)&&!empty($CGJ3)) {
			$CGJ=array($CGJ1,$CGJ2,$CGJ3);
			
		}elseif (!empty($CGJ1)&&!empty($CGJ2)) {
			$CGJ=array($CGJ1,$CGJ2);
		}elseif (!empty($CGJ1)) {
			$CGJ=array($CGJ1);
		}else{
			$this->YHZL->update_user_info(array('YHZT'=>'1'),'052475');
			success('home/user','恭喜你，基础资料成功录入！');
			die;
		}
		
		$this->CGJJL->insert_cgj_more($CGJ);
		$this->YHZL->update_user_info(array('YHZT'=>'1'),'052475');
		success('home/user','恭喜你，基础资料成功录入！');

	}


}