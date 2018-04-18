<?php
namespace app\admin\controller;

use think\Controller;
use think\Config;
use think\Db;
use think\Debug;
use think\Request;
use think\Session;
use think\File;
use think\Loader;
use test\Test;
//use wxpay\lib\WxPayApi;
//use wxpay\example\JsApiPay;
use wxpay\WxpayTotal;
use wxpay\lib\WxPayException;

$wxpayLog=EXTEND_PATH.'wxpay/example/log.php';
ini_set('date.timezone','Asia/Shanghai');
require_once ($wxpayLog);
//use app\admin\model\Impressionm;

class Wxpayt extends Controller{
	public function jsapipay(){
		$wxpaytotal=new WxpayTotal();
		$data=$wxpaytotal->jsapipay();
		//var_dump($data);
	}
	public function nativepay(){
		$wxpaytotal=new WxpayTotal();
		$data=$wxpaytotal->nativepay();
		$this->assign('data',$data);
		return $this->fetch('native');
//		var_dump($data);
	}
	
	
}
?>