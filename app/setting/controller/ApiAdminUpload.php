<?php
            if ($aliyunossInfo || $qiniuossInfo) {
                    $title = uuid() . '.' . $ext;
                    $res = model('addons\qiniuoss\model\QiniuossUploads')->defaultUpload($title,$tempContent,$type);
                }
                if ($aliyunossInfo) {
                    $title = uuid() . '.' . $ext;
                    $res = model('addons\aliyunoss\model\AliyunossUploads')->defaultUpload($title,$tempContent,$type);
                }
                if ($res['code'] == 1) {
                } else {
                    return jsonError($res['msg']);
                }