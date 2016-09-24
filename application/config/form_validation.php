<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'login' => array(
        array(
            'field' => 'YHJH',
            'label' => '警号',
            'rules' => 'required'
        ),
        array(
            'field' => 'YHMM',
            'label' => '密码',
            'rules' => 'required'
        )
    ),

    'update_info_01' => array(
        array(
            'field' => 'YHXB',
            'label' => '性别',
            'rules' => 'required'
        ),
        array(
            'field' => 'YHCSNY',
            'label' => '出生年月',
            'rules' => 'required|integer|exact_length[8]',
            'errors' => array(
                'integer' => '出生年月请填入8位时间，无需横线（如：1981年1月4日 填写为：19810104）',
                'required' => '出生年月必须填写（如：1981年1月4日 填写为：19810104）',
                'exact_length' => '出生年月必须为8位时间，无需横线（如：1981年1月4日 填写为：19810104）',
            ),
        ),
        array(
            'field' => 'YHGZSJ',
            'label' => '用户参加工作时间',
            'rules' => 'required|integer|exact_length[6]',
            'errors' => array(
                'integer' => '参加工作时间请填入8位时间，无需横线（如：2016年1月4日 填写为：20160104）',
                'required' => '参加工作时间必须填写（如：2016年1月4日 填写为：20160104）',
                'exact_length' => '参加工作时间必须为8位时间，无需横线（如：2016年1月4日 填写为：20160104）',
            ),
        ),
        array(
            'field' => 'YHHY',
            'label' => '婚姻状况',
            'rules' => 'required'
        ),
        array(
            'field' => 'YHDW',
            'label' => '所在单位',
            'rules' => 'required'
        ),
        array(
            'field' => 'YHZJ',
            'label' => '职务或职级',
            'rules' => 'required'
        ),
        array(
            'field' => 'YHDH',
            'label' => '联系方式',
            'rules' => 'required'
        )
    ),
    'update_info_02' => array(
        array(
            'field' => 'CYGX1',
            'label' => '第一成员关系',
            'rules' => 'required'
        ),
        array(
            'field' => 'CYXM1',
            'label' => '第一成员姓名',
            'rules' => 'required'
        ),
        array(
            'field' => 'CYNL1',
            'label' => '第一成员年龄',
            'rules' => 'required'
        ),
        array(
            'field' => 'CYDW1',
            'label' => '第一成员单位',
            'rules' => 'required'
        ),
        array(
            'field' => 'CYGX2',
            'label' => '第二成员关系',
            'rules' => 'required'
        ),
        array(
            'field' => 'CYXM2',
            'label' => '第二成员姓名',
            'rules' => 'required'
        ),
        array(
            'field' => 'CYNL2',
            'label' => '第二成员年龄',
            'rules' => 'required'
        ),
        array(
            'field' => 'CYDW2',
            'label' => '第二成员单位',
            'rules' => 'required'
        )
    ),
    'update_bl02_02' => array(
        array(
            'field' => 'QZBLLX',
            'label' => '签证办理类型',
            'rules' => 'required'
        ),
        array(
            'field' => 'NMDD',
            'label' => '出行目的地',
            'rules' => 'required'
        ),
        array(
            'field' => 'CXSY',
            'label' => '出行事由',
            'rules' => 'required'
        ),
        array(
            'field' => 'NCSJ',
            'label' => '拟出行时间',
            'rules' => 'required|integer|exact_length[8]',
            'errors' => array(
                'integer' => '拟出行时间请填入8位时间，无需横线（如：2016年1月4日 填写为：20160104）',
                'required' => '拟出行时间必须填写（如：2016年1月4日 填写为：20160104）',
                'exact_length' => '拟出行时间必须为8位时间，无需横线（如：2016年1月4日 填写为：20160104）',
            ),
        ),
        array(
            'field' => 'NHSJ',
            'label' => '拟归来时间',
            'rules' => 'required|integer|exact_length[8]',
            'errors' => array(
                'integer' => '拟归来时间请填入8位时间，无需横线（如：2016年1月4日 填写为：20160104）',
                'required' => '拟归来时间必须填写（如：2016年1月4日 填写为：20160104）',
                'exact_length' => '拟归来时间必须为8位时间，无需横线（如：2016年1月4日 填写为：20160104）',
            ),
        ),
        array(
            'field' => 'CXFS',
            'label' => '出行方式',
            'rules' => 'required'
        ),
        array(
            'field' => 'TY',
            'label' => '《民警因私出国（境）外出纪律承诺书》',
            'rules' => 'required',
            'errors' => array(
                'required' => '请认真阅读《民警因私出国（境）外出纪律承诺书》，并勾选',
            ),
        ),
        array(
            'field' => 'NJQ',
            'label' => '使用假期',
            'rules' => 'required'
        )
    )
);