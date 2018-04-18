<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/11
 * Time: 14:43
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Cookie;
use think\Session;

use app\admin\model\Merchant;
use app\admin\logic\LoginLogic;

class Home extends controller{

	
    public function index(){
    	$loginlogic=new LoginLogic();
		//获取session资料
		$user=$loginlogic->get_user();
		if(!$user){
			$this->success('请登录！',url('admin/index/index'));
		}
		return $this->fetch('home');
    }
    //测试
	public function test(){
		get_user();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}