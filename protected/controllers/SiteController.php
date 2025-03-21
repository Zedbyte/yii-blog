<?php

require_once Yii::getPathOfAlias('ext.phpmailer') . '/PHPMailer.php';
require_once Yii::getPathOfAlias('ext.phpmailer') . '/SMTP.php';
require_once Yii::getPathOfAlias('ext.phpmailer') . '/Exception.php';

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$criteria=new CDbCriteria(array(
			'condition'=>'status='.Post::STATUS_PUBLISHED,
			'order'=>'update_time DESC',
			'with'=>'commentCount',
		));
		if(isset($_GET['tag']))
			$criteria->addSearchCondition('tags',$_GET['tag']);
	
		$dataProvider=new CActiveDataProvider('Post', array(
			'pagination'=>array(
				'pageSize'=>10,
			),
			'criteria'=>$criteria,
		));
	
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
				$mail = new PHPMailer\PHPMailer\PHPMailer();
				$mail->isSMTP();
				$mail->Host = Yii::app()->params['smtpHost'];
				$mail->SMTPAuth = true;
				$mail->Username = Yii::app()->params['smtpUsername'];
				$mail->Password = Yii::app()->params['smtpPassword'];
				$mail->SMTPSecure = Yii::app()->params['smtpSecure'];
				$mail->Port = Yii::app()->params['smtpPort'];

				$mail->setFrom($model->email, $model->name);
				$mail->addAddress(Yii::app()->params['adminEmail']);
				$mail->Subject = $model->subject;
				$mail->Body = $model->body;

				$mail->SMTPDebug = 2;
				$mail->Debugoutput = 'html';

				if ($mail->send()) {
					Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
					$this->refresh();
				} else {
					Yii::app()->user->setFlash('error', 'Mailer Error: ' . $mail->ErrorInfo);
				}
			}
		}
		$this->render('contact', array('model' => $model));
	}
	// public function actionContact()
	// {
	// 	$model=new ContactForm;
	// 	if(isset($_POST['ContactForm']))
	// 	{
	// 		$model->attributes=$_POST['ContactForm'];
	// 		if($model->validate())
	// 		{
	// 			$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
	// 			$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
	// 			$headers="From: $name <{$model->email}>\r\n".
	// 				"Reply-To: {$model->email}\r\n".
	// 				"MIME-Version: 1.0\r\n".
	// 				"Content-Type: text/plain; charset=UTF-8";

	// 			mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
	// 			Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
	// 			$this->refresh();
	// 		}
	// 	}
	// 	$this->render('contact',array('model'=>$model));
	// }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}