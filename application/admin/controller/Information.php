<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Cookie;
use think\Session;

use app\admin\model\Merchant;
use app\admin\logic\LoginLogic;

class Information extends Controller{
	//商户中心
	public function index(){
		$loginlogic=new LoginLogic();
		//获取session资料
		$user=$loginlogic->get_user();
		if(!$user){
			$this->success('请登录！',url('admin/index/index'));
		}
    	$merchant=new Merchant();
    	$data=$merchant->merchant_all($user['account']);
    	$this->assign('data',$data);
		return $this->fetch('personal');
	}
	//修改资料
    public function modify_information(){
    	$loginlogic=new LoginLogic();
		//获取session资料
		$user=$loginlogic->get_user();
		if(!$user){
			$this->success('请登录！',url('admin/index/index'));
		}
    	$merchant=new Merchant();
    	$data=$merchant->merchant_all($user['account']);
    	$this->assign('data',$data);
    	return $this->fetch('');
    }
    
}
