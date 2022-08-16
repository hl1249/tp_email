<?php
namespace app\index\controller;


use think\Controller;

// 引入数据库操作类
use think\Db;
// 引用接参数
use think\Request;

// 引入redis配置类
use think\facade\Cache;

class Index extends Controller
{
    public function index()
    {
       return $this->fetch();
    }

    public function write($name = 'ThinkPHP5')
    {
        $write = Cache::store('redis')->set('wuhu','10086');
        
        if($write){
              echo "写入成功！";
        }else{
            
              echo "写入失败！";
        }
    }
    
    public function delete(){
        Cache::store('redis')->del('wuhu','10086');
    }
    
    public function read(){
        echo Cache::store('redis')->get('wuhu');
    }
    
    
    public function hello(Request $request){
        $email = $request -> get('email');
        return $email;
        // return $this->fetch();
    }
    
    public function phpinfo(){
        echo phpinfo();
    }
}
