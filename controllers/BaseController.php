<?php

namespace app\controllers;

use app\models\UserIdentity;
use app\modules\admin\models\Users;
use yii\web\Controller;
use Yii;

class BaseController extends Controller
{

    /**
     * Check 'hash' for hash login feature.
     * @return bool
     */
    private function loginHash()
    {
        $hash = Yii::$app->request->get('hash');
        $userInfo = unserialize(base64_decode($hash));
        $username = $userInfo['username'];
        $password = $userInfo['password'];
        $timestamp = $userInfo['timestamp'];

        $user = UserIdentity::findByUsername($username);

        if ($user && $user->validatePassword($password)) {
            Yii::$app->user->login($user, 1600);
            return true;
        } else {
            return false;
        }

    }

    /**
     * Before each Module action check authentication and make authentication bu the hash if it need.
     * If user logined by hash or was logined before - redirect to requested page,
     * else redirect to login page.
     * @param \yii\base\Action $action
     * @return bool
     */
   /* public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {

            if ($this->id . '/' . $action->id !== 'site/login') {

                if (Yii::$app->user->isGuest) {

                    if (Yii::$app->request->get('hash')) {

                        if (!$this->loginHash()) {
                            Yii::$app->response->redirect('/site/login');
                        }
                    } else {
                        Yii::$app->response->redirect('/site/login');
                    }

                }

                if (Yii::$app->user->identity->rights !== 'admin') {

                    if ($this->module->id !== 'forms') {
                        Yii::$app->user->logout();
                        Yii::$app->response->redirect('/site/login');
                    }

                }

            }

        }
        return true;
    }
*/
}