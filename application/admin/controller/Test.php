<?php
namespace app\admin\controller;

use think\Model;
use think\Config;
use think\Db;
use think\Debug;
use think\Url;
use think\Session;
use think\Cookie;
use think\Request;

use think\Controller;

class Test extends Controller{
	
	public function index(){
		return $this->fetch('test');
	}
	
}
