<?php

/**
 * This is the model class for table "tbl_job_testimonials".
 *
 * The followings are the available columns in table 'tbl_job_testimonials':
 * @property integer $testimonials_id
 * @property integer $image_id
 * @property string $title
 * @property string $descriptions
 */
class JobTestimonials extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_job_testimonials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('image_id', 'numerical', 'integerOnly'=>true),
			array('title, descriptions', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('testimonials_id, image_id, title, descriptions', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'testimonials_id' => 'Testimonials',
			'image_id' => 'Image',
			'title' => 'Title',
			'descriptions' => 'Descriptions',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('testimonials_id',$this->testimonials_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('descriptions',$this->descriptions,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JobTestimonials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
