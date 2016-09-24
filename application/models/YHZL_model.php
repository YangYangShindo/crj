<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	class YHZL_model extends CI_Model{

		/**
		 * 用户资料模型，处理用户表的数据操作
		 */

		public function check_login($YHJH){
			/**
			 * 检测用户登录
			 */
			$query=$this->db->select('YHMM,YHZT')
							->where(array('YHJH'=>$YHJH))
							->get('YHZL');

			
			$row=$query->row_array();
			return $row;
			// var_dump($row);
			// die;
			// return $row['YHMM'];
			
			


		}
		public function get_user_info($YHJH){

			/**
			 * 获取用户全部资料
			 */
			$query=$this->db->where(array('YHJH'=>$YHJH))->get('YHZL')->result_array();
			return $query;


		}

		public function update_user_info($data,$YHJH){
			/**
			 * 更新用户资料，通过YHJH匹配
			 */
			$this->db->update('YHZL', $data, array('YHJH'=>$YHJH));
			

		}


	}