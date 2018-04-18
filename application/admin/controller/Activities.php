<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Cookie;
use think\Session;

use app\admin\model\Merchant;
use app\admin\logic\LoginLogic;

class Activities extends Controller{
	public function index(){
		
	}
	public function my_activities(){
		return $this->fetch('');
	}
	public function new_activities(){
		
		return $this->fetch('');
	}
	
	
	
}
