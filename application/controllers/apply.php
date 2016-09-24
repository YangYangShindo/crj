<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

	//用户新办证件及签证申请控制器


	public function __construct(){

		parent::__construct();
		$this->load->model('YHZL_model','YHZL');
		$this->load->model('JTCY_model','JTCY');
		$this->load->model('CGJJL_model','CGJJL');

	}

	//申请签证，及出行
	public function bl02(){

		$this->load->helper('form');

		$data['user_info']=$this->YHZL->get_user_info('052475');
		
		$this->load->view('user/bl02.html',$data);



	}
	public function bl02_02(){

		//申请签证办理第二步界面

		$this->load->helper('form');

		$this->load->view('user/bl02_02.html');

	}
	public function update_bl02(){
		/**
		 * 个人资料完善提交第一步
		 */
		//$YHXB=$this->input->post('YHXB');
		$this->load->helper('form');
		$this->load->library('form_validation');

		
		if ($this->form_validation->run('update_info_01') == FALSE)
		{
			
		    
			$data['user_info']=$this->YHZL->get_user_info('052475');
			$this->load->view('user/bl02.html',$data);
			
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
			success('apply/bl02_02','更新成功，进入下一步！');
		}
	}

	public function update_bl02_02(){

		//第二步数据提交处理
		$this->load->helper('form');
		$this->load->library('form_validation');
		if ($this->form_validation->run('update_bl02_02') == FALSE)
		{
			
		    
			$this->load->view('user/bl02_02.html');
			
		}
		else
		{	

			$data=array(

					'QZBLLX'=>$this->input->post('QZBLLX'),
					'NMDD'=>$this->input->post('NMDD'),
					'CXSY'=>$this->input->post('CXSY'),
					'NCSJ'=>$this->input->post('NCSJ'),
					'NHSJ'=>$this->input->post('NHSJ'),
					'CXFS'=>$this->input->post('CXFS'),
					'NJQ'=>$this->input->post('NJQ'),
					'YHJH'=>'052475',
					'QZBLZT'=>'1'
				);
			$this->CGJJL->insert_cgj_single($data);
			success('home/user','提交成功！');
		}



	}
}
