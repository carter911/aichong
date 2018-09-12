<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use think\Config;
use think\Db;
use think\Session;

/**
 * 修改密码
 * Class ChangePassword
 * @package app\admin\controller
 */
class ChangePassword extends AdminBase
{
    /**
     * 修改密码
     * @return mixed
     */
    public function index()
    {
        return $this->fetch('system/change_password');
    }
    public function diachange_password()
    {
    	return $this->fetch('system/diachange_password');
    }
    /**
     * 更新密码
     */
    public function updatePassword()
    {
        if ($this->request->isPost()) {
            $admin_id    = Session::get('admin_id');
            $data   = $this->request->param();
            $result = Db::name('admin_user')->find($admin_id);

            if ($result['password'] == md5($data['old_password'] . $result['salt'])) {
                if ($data['password'] == $data['confirm_password']) {
                    $new_password = md5($data['password'] . $result['salt']);
                    $res          = Db::name('admin_user')->where(['id' => $admin_id])->setField('password', $new_password);

                    if ($res !== false) {
                        //$this->success('修改成功');
                        return json(array('code' => 200, 'msg' => '修改成功'));
                    } else {
                       // $this->error('修改失败');
                        return json(array('code' => 0, 'msg' => '修改失败'));
                    }
                } else {
                   // $this->error('两次密码输入不一致');
                    return json(array('code' => 0, 'msg' => '两次密码输入不一致'));
                }
            } else {
              //  $this->error('原密码不正确');
                return json(array('code' => 0, 'msg' => '原密码不正确'));
            }
        }
    }
}