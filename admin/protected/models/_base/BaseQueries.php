<?php

/**
 * This is the model base class for the table "tbl_queries".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Queries".
 *
 * Columns in table "tbl_queries" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $salutation
 * @property string $name
 * @property string $email_address
 * @property string $contact_number
 * @property string $is_policy_holder
 * @property string $subject
 * @property string $comments
 * @property string $nric
 * @property string $date
 * @property string $ip_address
 * @property integer $is_read
 *
 */
abstract class BaseQueries extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_queries';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Queries|Queries', $n);
	}

	public static function representingColumn() {
		return 'salutation';
	}

	public function rules() {
		return array(
			array('salutation, name, email_address, contact_number, is_policy_holder, subject, comments, nric, date, ip_address, is_read', 'required'),
			array('is_read', 'numerical', 'integerOnly'=>true),
			array('salutation, contact_number, nric, ip_address', 'length', 'max'=>20),
			array('name, email_address', 'length', 'max'=>200),
			array('is_policy_holder', 'length', 'max'=>10),
			array('id, salutation, name, email_address, contact_number, is_policy_holder, subject, comments, nric, date, ip_address, is_read', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'salutation' => Yii::t('app', 'Salutation'),
			'name' => Yii::t('app', 'Name'),
			'email_address' => Yii::t('app', 'Email Address'),
			'contact_number' => Yii::t('app', 'Contact Number'),
			'is_policy_holder' => Yii::t('app', 'Is Policy Holder'),
			'subject' => Yii::t('app', 'Subject'),
			'comments' => Yii::t('app', 'Comments'),
			'nric' => Yii::t('app', 'Nric'),
			'date' => Yii::t('app', 'Date'),
			'ip_address' => Yii::t('app', 'Ip Address'),
			'is_read' => Yii::t('app', 'Is Read'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('salutation', $this->salutation, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('email_address', $this->email_address, true);
		$criteria->compare('contact_number', $this->contact_number, true);
		$criteria->compare('is_policy_holder', $this->is_policy_holder, true);
		$criteria->compare('subject', $this->subject, true);
		$criteria->compare('comments', $this->comments, true);
		$criteria->compare('nric', $this->nric, true);
		$criteria->compare('date', $this->date, true);
		$criteria->compare('ip_address', $this->ip_address, true);
		$criteria->compare('is_read', $this->is_read);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}