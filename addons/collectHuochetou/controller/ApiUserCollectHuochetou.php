<?php
namespace addons\collectHuochetou\controller;
            $publish_time = input('post.publish_time') ? input('post.publish_time') : time();;
            if (!$cid) {
            if (!$uid) {
            $articleInfo = db('Articles')->where('title',$title)->find();
            if ($articleInfo) {
                $uuid = uuid();
                $resArray = array(
                if (is_array($fieldList)) {
                db('Articles')->insert($resArray);
                        if (is_array($tags)) {
                    model('app\article\model\Articles')->itemPushUrl($itemInfo);
                    return jsonSuccess('发布成功',$result);
                } else {
    }
        if (Request::instance()->isPost()) {
            $password = input('post.password');
            //请将'www.mipcms.com' 修改成自己的密码
            if ($password != db('key')->where('key','collect_huochetou')->find()['val']) {
                return jsonError('密码错误');
                exit();
            }
            $title = input('post.title');
            $content = input('post.content');
            $cid = input('post.cid');
            $url_name = input('post.url_name');
            $tags = input('post.tags');
            $publish_time = input('post.publish_time') ? input('post.publish_time') : time();;
            $itemType = 'article';
            $is_recommend = input('post.is_recommend');
            
            if (!$is_recommend) {
                $is_recommend = 0;
            }
            if (!$title) {
              return jsonError('请输入标题');
            }
            if (!$content) {
              return jsonError('请输入内容');
            }
            if (!$cid) {
                $cid = 1;
            }
             
            $articleInfo = db('Articles')->where('title',$title)->find();
            $articleInfoApproval = db('ArticlesTimeMain')->where('title',$title)->find();
            if ($articleInfo || $articleInfoApproval) {
                return jsonError('文章已存在');
            }
            $main_id = uuid();
             db('ArticlesTime')->insert(array(
                'uuid' => $main_id,
                'cid' => $cid,
                'create_time' => time(),
                'publish_time' => $publish_time,
                'main_id' => $main_id,
            ));
            $createInfo = db('ArticlesTimeMain')->insert(array(
               'title'=>htmlspecialchars($title),
               'uid' => $this->userId,
               'main_id' => $main_id,
               'is_recommend' => $is_recommend,
               'content' => htmlspecialchars($content),
               'tags' => $tags,
               'url_name' => $url_name
            ));
            if ($createInfo) {
                return jsonSuccess('发布成功');
            } else {
                return  jsonError('提交失败');
            }
}