<?php
//MIPCMS.Com [Don't forget the beginner's mind]
//Copyright (c) 2017~2099 http://www.ssycms.com All rights reserved.
namespace app\user\controller;
use think\Request;
    public function login()
    }
    public function reg()
        $data['username'] = Htmlp::htmlp(trim($data['username']," \t\n\r\0\x0B"));
        $data['password'] = Htmlp::htmlp(trim($data['password']," \t\n\r\0\x0B"));
        $data['rpassword'] = Htmlp::htmlp(trim($data['rpassword']," \t\n\r\0\x0B"));
//      if (!preg_match("/^1[34578]\d{9}$/", $data['username'])) {
//          return jsonError('用户名必须为手机号码');
//      }
    }
}