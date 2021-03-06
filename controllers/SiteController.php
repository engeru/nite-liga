<?php

namespace app\controllers;

use app\models\Config;
use app\models\Games;
use app\models\TestForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Players;
use app\models\PlayerInTeam;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionConfig(){

        //
        if(Yii::$app->request->isAjax){
           $action = Yii::$app->request->post('action');
           switch($action){
               case 'runGame':
                   break;
               case 'runTest':
                   break;
               default:

           }
        }

        $isGameOn = Config::getArg('_IS_GAME_ON');

        $dataProviderConfig = new ActiveDataProvider([
            'query' => Config::find()->where(['isChangable' => 1]),
            'pagination' => [
                'pageSize' => 15,
                'pageParam' => 'cfg-page'
            ]
        ]);

        return $this->render('config', [
            'dataProviderConfig' => $dataProviderConfig,
            'isGameOn' => $isGameOn,
            'model' => new TestForm()
        ]);
    }

    public function actionRegTeams(){

        $dataProvederPlayers = new ActiveDataProvider([
            'query' => Players::find(),
            'pagination' => [
                'pageSize' => 15,
                'pageParam' => 'plr-page'
            ]
        ]);

        $dataProvederTeams = new ActiveDataProvider([
            'query' => PlayerInTeam::find(),
            'pagination' => [
                'pageSize' => 15,
                'pageParam' => 'tm-page'
            ]
        ]);

        return $this->render('reg-teams', [
            'dataProviderPlayers' => $dataProvederPlayers,
            'dataProviderTeams' => $dataProvederTeams
        ]);
    }

    public function actionPlayersInfo(){

        $dataProviderPlayers = new ActiveDataProvider([
            'query' => Players::find(),
            'pagination' => [
                'pageSize' => 15,
                'pageParam' => 'plr-page'
            ]
        ]);

        $dataProviderGames = new ActiveDataProvider([
            'query' => Games::find(),
            'pagination' => [
                'pageSize' => 5,
                'pageParam' => 'gm-page'
            ]
        ]);

        return $this->render('players-info', [
            'dataProviderPlayers' => $dataProviderPlayers,
            'dataProviderGames' => $dataProviderGames,
        ]);
    }
}
