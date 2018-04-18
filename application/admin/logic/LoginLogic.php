<?php
namespace app\admin\logic;

use think\Model;
use think\Config;
//use think\Db;
use think\Debug;
use think\Url;
use think\Session;
use think\Cookie;
use think\Request;

class LoginLogic extends Model{
	//处理登录
	public function login($account='',$password='',$code=''){
//		Cookie::set('account',$account,36000);
//		Cookie::set('password',$password,3600);
//		Cookie::set('code',$code,3600);
		Session::set('account',$account);
		Session::set('password',$password);
		Session::set('code',$code);
	}
	public function single_login(){
		$account=Session::get('account');
		$password=Session::get('password');
		$code=Session::get('code');
		$data=array(
			'account'=>$account,
			'password'=>$password,
			'code'=>$code
		);
		return $data;
	}
	//退出登录，清除session
	public function logout(){
		
	}
	public function get_user(){
		$user['account']=Session::get('account');
		$user['password']=Session::get('password');
		$user['code']=Session::get('code');
		if(arr_is_null($user)){
			return false;
		}
		return $user;
	}

}
?>