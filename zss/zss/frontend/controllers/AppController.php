<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\Admin;
use frontend\models\Shop;
use frontend\models\picture\BannerForm;
use frontend\models\ZssBanner;
use frontend\models\picture\BannerGroupForm;
use frontend\models\ZssBannerGroup;
use frontend\models\ZssAuthRole;
use frontend\models\ZssAuthAdminNode;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
class AppController extends Controller
{
    /**
     * @cf 实现轮播图的列表展示
     */
    public function actionCf()
    {

        $model = new ZssBanner();

        $carouselinfo = $model->banngroup();

        return $this->render('uploadlist', ['lunarr' => $carouselinfo]);
    }
    /**
     * @addcf 实现轮播图的添加
     */
    public function actionAddcf()
    {
        $model = new ZssBanner();
        $banner = new BannerForm();
        $group = new ZssBannerGroup();
        $arrgroup = $group->group();
        $post = Yii::$app->request->post();

        if ($banner->load($post) && $banner->validate()) {


            $imginfo = $banner->banner_thumb = UploadedFile::getInstance($banner,
                'banner_thumb');

            if ($imginfo) {
                $reimg = $banner->upload();


            if ($imginfo) {
                $reimg = $banner->upload();

                if ($reimg) {
                    $post['banner_thumb'] = $reimg;
                    $addresult = $model->add($post);
                    if (!$addresult) {
                        echo "<script>alert('添加失败');</script>";
                    } else {
                        $this->redirect(array('/app/cf'));
                    }
                }
            } else {
                echo "<script>alert('请选择上传图片')</script>";
            }


        }
		}
        return $this->render('uploadadd', ['arrgroup' => $arrgroup, "model" => $banner]);
    }
    /**
     *  @cfdel 实现轮播图删除
     */
    public function actionCfdel()
    {
        $banner_id = Yii::$app->request->get('banner_id');
        $model = new ZssBanner();
       $seleone = $model->up($banner_id);
        $re = $model->del($banner_id);
        if ($re) {
            $delresult = unlink($seleone['banner_thumb']); //当数据库删除成功之后删除该图片
            $this->redirect(array("/app/cf"));
        } else {
            echo "<script>alert('删除失败');location.href='index.php?r=app/cf';</script>";
        }
    }
    /**
     * @cfup 实现轮播图的修改
     */
    public function actionCfup()
    {
        $model = new ZssBanner();
        $banner_id = Yii::$app->request->get('banner_id');
        $post = Yii::$app->request->post();
        if (Yii::$app->request->isPost) {
            $result = $model->banner_thumb = UploadedFile::getInstance($model,
                'banner_thumb');
            if ($result) {
                $dir = "assets/uploads/" . date("Y-m-d") . "/";
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                $name = rand(5, 15);
                $all = array(
                    "jpg",
                    "png",
                    "jpeg",
                    "gif");
                $type = $model->banner_thumb->extension;
                $form = in_array($type, $all);
                if ($form) {
                    $re = $model->banner_thumb->saveAs($dir . $name . '.' . $model->banner_thumb->
                        extension);
                    if ($re) {
                        $post['banner_thumb'] = $dir . $name . '.' . $model->banner_thumb->extension;
                    }
                } else {
                    echo "<script>alert('图片格式错误');window.history.go(-1)</script>";
                    die;
                }
            }
            $end = $model->trueup($post);
            if ($end) {
                $this->redirect(array('/app/cf'));
            } else {
                echo "<script>alert('修改失败');window.history.go(-1)</script>";
                die;
            }
        }
        $group = new ZssBannerGroup();
        $arrone = $model->up($banner_id);
        $arrgroup = $group->group();
        return $this->render('uploadeditor', ['arrgroup' => $arrgroup, "arrone" => $arrone,
            "model" => $model]);
    }
    /**
     * @cg 实现图片轮播组的展示列表
     */
    public function actionCg()
    {
        $model = new ZssBannerGroup();
        $arrgroup = $model->group();
        return $this->render('grouplist', ['arrgroup' => $arrgroup]);
    }
    /**
     * @delgroup 实现图片轮播组的删除
     */
    public function actionDelgroup()
    {
        $group_id = Yii::$app->request->get('group_id');
        $model = new ZssBannerGroup();
        $re = $model->delgroup($group_id);
        if ($re) {
            $this->redirect(array("/app/cg"));
        } else {
            echo "<script>alert('删除失败');location.href='index.php?r=app/cf';</script>";
        }
    }
    /**
     * @Upgroup 实现图片轮播组的修改
     */

    public function actionUpgroup()
    {
        $model = new ZssBannerGroup();
        $group_id = Yii::$app->request->get('group_id');
        $post = Yii::$app->request->post();
        if ($post) {
            $result = $model->trueup($post);

            if ($result) {
                $this->redirect(array("/app/cg"));
            } else {
                echo "<script>alert('修改失败');window.history.go(-1)</script>";
                die;
            }
        }
        $arrgroup = $model->upgroup($group_id);
        return $this->render('groupeditor', ['arrone' => $arrgroup, "model" => $model]);
    }
    /**
     * @addgroup 实现轮播组的添加
     */
    public function actionAddgroup()
    {
        $model = new ZssBannerGroup();
        $group = new BannerGroupForm();
        $post = Yii::$app->request->post();
        if ($group->load($post) && $group->validate()) {

            $result = $model->addgroup($post);
            if ($result) {
                $this->redirect(array("/app/cg"));
            } else {
                echo "<script>alert('添加失败');window.history.go(-1)</script>";
                die;
            }

        }
        return $this->render('groupadd', ['model' => $group]);
    }
    /**
     * @addgroup 实现轮播组的显示状态
     */
     public function actionUpstatus(){
         $model = new ZssBannerGroup();
         $status = Yii::$app->request->get('status');
         $group_id = Yii::$app->request->get('group_id');
         $result = $model->status($status,$group_id);
         
     }
}
