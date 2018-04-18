<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Cookie;

use app\admin\model\Merchant;

class Index extends Controller
{
	//主页登录
	public function index(){
		return $this->fetch('index');
	}
	//登录
	public function login(){
		$data=input('post.',null,'htmlspecialchars');
		$account=$data['account'];
		$password=$data['password'];
		if(empty($account) || empty($password)){
			//未填账号
			return 2;
		}
		$password=sha1(sha1($data['password']));
//		echo $account.$password;
		$merchant = new Merchant();
		//0，未成功，1，成功
		return $merchant -> login($account,$password);
	}
	//检测登录状态
	public function check_login(){
		$account=Cookie::get('account');
		$password=Cookie::get('password');
		$code=Cookie::get('code');
		if(empty($account) || empty($password) || empty($code)){
			//未登录
			return '2';
		}
		$merchant = new Merchant();
		return $merchant->single_login();
	}
	//注销登录
	public function logout(){
		//销毁cookie
		//跳转界面
		Cookie::delete('account');
		Cookie::delete('password');
		Cookie::delete('code');
		$this->success('注销成功！',url('admin/index/index'));
	}
	public function register(){
		return $this->fetch('register');
	}
	public function check_register(){
		$data=input('post.',null,'htmlspecialchars');
		if(arr_is_null($data)){
			return 0;
		}
		//安全确认
		$data['account']=$data['account'];
		$data['password']=sha1(sha1($data['password']));
		$data['phone']=$data['phone'];
		$data['register_time']=time();
		$merchant=new Merchant();
		return $merchant->register($data);
	}
	public function logout(){
		$data=input('post.',null,'htmlspecialchars');
		$data=json_decode($data,true);
		$merchant = new Merchant();
		if($merchant->single_login()){
			
		}
	}
	//测试
	public function test(){
//		echo $account=Cookie::get('account').'<br>';
//		echo $password=Cookie::get('password').'<br>';
//		echo $code=Cookie::get('code');
//		echo $code=Cookie::get('555');
//		Cookie::delete('5645656');
//		$data=Db::name('admin')->select();
//		$business=Db::name('business')->select();
//		print_r($data);
//		print_r($business);
		$account=Cookie::get('account');
		$password=Cookie::get('password');
		$code=Cookie::get('code');
		echo $account.'<br>';
		echo $password.'<br>';
		echo $code;
	}
	
	
}

?>