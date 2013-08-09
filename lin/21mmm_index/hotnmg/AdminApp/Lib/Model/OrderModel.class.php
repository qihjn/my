<?php 
/**
 * 
 * Order(订单)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: OrderModel.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */
 
import("AdvModel");
class OrderModel extends AdvModel 
{
	protected $_validate = array(
        array('realname', 'require', '姓名必填', 0, '', Model:: MODEL_BOTH),
        array('telephone', 'require', '电话号码必填', 0, '', Model:: MODEL_BOTH),
        array('address', 'require', '收货地址必填', 0, '', Model:: MODEL_BOTH),
        array('introduction', 'require', '订单说明必填', 0, '', Model:: MODEL_BOTH),
    );

    protected $_auto = array(
        array('realname', 'dHtml', Model:: MODEL_BOTH, 'function'),
        array('brithday', 'strtotime', Model:: MODEL_BOTH, 'function'),
        array('telephone', 'dHtml', Model:: MODEL_BOTH, 'function'),
        array('address', 'dHtml', Model:: MODEL_BOTH, 'function'),
        array('zipcode', 'dHtml', Model:: MODEL_BOTH, 'function'),
        array('fax', 'dHtml', Model:: MODEL_BOTH, 'function'),
        array('ip', 'get_client_ip', Model:: MODEL_INSERT, 'function'),
        array('create_time', 'time', Model:: MODEL_INSERT, 'function'),
        array('update_time', 'time', Model:: MODEL_UPDATE, 'function'),
    );
}