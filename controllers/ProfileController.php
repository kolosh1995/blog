<?php

namespace app\controllers;

use app\models\PasswordChangeForm;
use app\models\Post;
use app\models\ProfileUpdateForm;
use app\modules\admin\rbac\Rbac;
use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProfileController implements the CRUD actions for User model.
 */
class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [Rbac::PERMISSION_USER_PANEL],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $id = \Yii::$app->user->identity->id;
        $postDataProvider = new ActiveDataProvider([
            'query' => Post::find()->where(['author_id' => Yii::$app->user->id]),
            'pagination' => [
                'pageSize' => 5,
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ],
        ]);
        return $this->render('index', [
            'model' => $this->findModel($id),
            'postDataProvider' => $postDataProvider,
        ]);
    }

    public function actionUpdate()
    {
        $id = \Yii::$app->user->id;
        $user = $this->findModel($id);
        $model = new ProfileUpdateForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate()
    {
        $model = new Post();
        $model->author_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('createPost', [
            'model' => $model,
        ]);
    }


    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPasswordChange()
    {
        $id = \Yii::$app->user->id;
        $user = $this->findModel($id);
        $model = new PasswordChangeForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('passwordChange', [
                'model' => $model,
            ]);
        }
    }

}
