<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	class CGJJL_model extends CI_Model{
		/**
		 * 出国境记录数据表操作模型
		 */

		public function insert_cgj_more($data){
			/**
			 * 多数据批量插入
			 */
			$query=$this->db->insert_batch('CGJJL', $data);
			return $query;

		}

		public function insert_cgj_single($data){
			//单条数据插入
			$query=$this->db->insert('CGJJL',$data);
			return $query;

		}

	}