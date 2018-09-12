<?php
namespace app\index\controller;
use app\common\model\Upload as UploadModel;

use app\common\controller\HomeBase;
use think\Exception;

class Upload extends HomeBase
{
    function _initialize()
    {
    	
        parent::_initialize();
        $this->model =new UploadModel();
    }
    public function upimage()
    {

    	 return json($this->model->upfile('images'));
    }
    public function upfile()
    {
        return json($this->model->upfile('files'));
    }
    public function upattach()
    {
       
        return json($this->model->upfile('files','file','attach'));
     
    
    }
    public function wangeditor_upimage()
    {
    	try{
			if (!session('userid') || !session('username')) {
				$this->error('亲！请登录', url('user/login/index'));
			} else {
				$info = $this->model->upfile("images", "FileName");
				if($info['code'] != 200){
					return '';
				}
				return $info['headpath'];

			}
		}catch (Exception $e){
			echo $e->getMessage();
		}

    }
}