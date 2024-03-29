<?php

class AnnotationsController extends ERestController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function _filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function _accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if(isset($_GET['id'])) {
			$model->id=$_GET['id'];
		}

		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));

		echo $this->renderJSON($model);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Annotations;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Annotations']))
		{
			$model->attributes=$_POST['Annotations'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->annotation_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));

		//echo $this->renderJSON($model);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Annotations']))
		{
			$model->attributes=$_POST['Annotations'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->annotation_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));

		echo $this->renderJSON($model);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(isset($_GET['document_id'])) {
			$model->document_id=$_GET['document_id'];
		}
		$dataProvider=new CActiveDataProvider('Annotations');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Annotations('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Annotations'])) {
			$model->attributes=$_GET['Annotations'];
		}
		if(isset($_GET['document_id'])) {
			$model->attributes=$_GET['document_id'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function doRestList() {
		$filter = array();
		if(isset($_GET['document_id'])) {
			$filter[] = array('property'=>'document_id', 'value'=>$_GET['document_id']);
		}
		$this->renderJson($this->getModel()->with($this->nestedRelations)->filter($filter)->orderBy($this->restSort)->limit($this->restLimit)->offset($this->restOffset)->findAll());
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Annotations the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Annotations::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Annotations $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='annotations-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
