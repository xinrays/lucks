<?php
namespace app\admin\model;

use think\Config;
use think\File;
use think\Request;
use think\Db;
use think\Model;
use think\Session;
use think\Cookie;

use app\admin\logic\LoginLogic;

class Merchant extends Model{
	public function login($account='',$password=''){
		$loginlogic=new LoginLogic();
		$map=array(
			'account' => $account,
			'password'=>$password
		);
		$info=Db::name('hdxt_merchant')->where($map)->find();
		if(!!$info){
			$time=time();
			//唯一登陆码
			$code=sha1($time.rand(10000,99999));
			$update=array(
				'code'=> $code,
				'last_login_time'=>$time
			);
			Db::name('hdxt_merchant')->where('id',$info['id'])->update($update);
			$loginlogic->login($account,$password,$code);
			return '1';
		}else{
			return '0';
		}
	}
	public function single_login(){
		$loginlogic=new LoginLogic();
		$map=$loginlogic->single_login();
		$info=Db::name('hdxt_merchant')->where($map)->find();
		if(!!$info){
			//检查登录没问题
			return 1;
		}else{
			//检查异地登录
			return 0;
		}		
	}
	public function register($data=''){
		$map=array(
			'account'=>$data['account'],
			'password'=>$data['password'],
			'phone'=>$data['phone'],
			'register_time'=>$data['register_time']
		);
		$info=Db::name('hdxt_merchant')->insert($map);
		if(!!$info){
			return 1;
		}else{
			return 0;
		}
	}
	public function merchant_all($account=''){
		if(empty($account)){
			$account=Session::get('account');
		}
		$data=Db::name('hdxt_merchant')->where('account',$account)->select();
		return $data;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
