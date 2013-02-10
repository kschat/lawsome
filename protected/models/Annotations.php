<?php

/**
 * This is the model class for table "annotations".
 *
 * The followings are the available columns in table 'annotations':
 * @property integer $id
 * @property integer $document_id
 * @property string $title
 * @property string $annotation
 *
 * The followings are the available model relations:
 * @property Documents $document
 */
class Annotations extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Annotations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'annotations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('document_id, title, annotation', 'required'),
			array('document_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, document_id, title, annotation', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'document' => array(self::BELONGS_TO, 'Documents', 'document_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'document_id' => 'Document',
			'title' => 'Title',
			'annotation' => 'Annotation',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('document_id',$this->document_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('annotation',$this->annotation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function behaviors() {
		return array(
			'commentable' => array(
                'class' => 'ext.comment-module.behaviors.CommentableBehavior',
                // name of the table created in last step
                'mapTable' => 'annotation_comments',
                // name of column to related model id in mapTable
                'mapRelatedColumn' => 'postId'
            ),
		);
	}
}