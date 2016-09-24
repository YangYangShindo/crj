<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	class JTCY_model extends CI_Model{

		/**
		 * 家庭成员数据表操作模型
		 */

		public function insert_user_info_more($CYTJ){
			/**
			 * 多数据批量插入
			 */
			$query=$this->db->insert_batch('JTCY', $CYTJ);
			return $query;

		}

	}