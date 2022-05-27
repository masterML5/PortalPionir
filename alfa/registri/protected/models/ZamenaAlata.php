<?php

/**
 * This is the model class for table "ZamenaAlata".
 *
 * The followings are the available columns in table 'ZamenaAlata':
 * @property integer $br
 * @property string $Datum
 * @property string $VremeZamene
 * @property string $Operater
 * @property boolean $Postavljanje
 * @property string $Proizvod
 * @property string $BrRadNal
 * @property string $Alat
 * @property string $Presa
 * @property integer $TrajanjeOper
 * @property boolean $Prljav
 * @property boolean $Neispravan
 * @property boolean $Komande
 * @property string $Napomena
 */
class ZamenaAlata extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ZamenaAlata';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Datum, Postavljanje, Alat', 'required'),
			array('TrajanjeOper', 'numerical', 'integerOnly'=>true),
			array('Operater, Proizvod, Alat, Presa', 'length', 'max'=>50),
			array('BrRadNal', 'length', 'max'=>12),
			array('Napomena', 'length', 'max'=>1073741823),
			array('VremeZamene, Prljav, Neispravan, Komande', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('br, Datum, VremeZamene, Operater, Postavljanje, Proizvod, BrRadNal, Alat, Presa, TrajanjeOper, Prljav, Neispravan, Komande, Napomena', 'safe', 'on'=>'search'),
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
			'br' => 'Br',
			'Datum' => 'Datum',
			'VremeZamene' => 'Vreme Zamene',
			'Operater' => 'Operater',
			'Postavljanje' => 'Postavljanje',
			'Proizvod' => 'Proizvod',
			'BrRadNal' => 'Br Rad Nal',
			'Alat' => 'Alat',
			'Presa' => 'Presa',
			'TrajanjeOper' => 'Trajanje Oper',
			'Prljav' => 'Prljav',
			'Neispravan' => 'Neispravan',
			'Komande' => 'Nožne komande',
			'Napomena' => 'Napomena',
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

		$criteria->compare('br',$this->br);
		$criteria->compare('Datum',$this->Datum,true);
		$criteria->compare('VremeZamene',$this->VremeZamene,true);
		$criteria->compare('Operater',$this->Operater,true);
		$criteria->compare('Postavljanje',$this->Postavljanje);
		$criteria->compare('Proizvod',$this->Proizvod,true);
		$criteria->compare('BrRadNal',$this->BrRadNal,true);
		$criteria->compare('Alat',$this->Alat,true);
		$criteria->compare('Presa',$this->Presa,true);
		$criteria->compare('TrajanjeOper',$this->TrajanjeOper);
		$criteria->compare('Prljav',$this->Prljav);
		$criteria->compare('Neispravan',$this->Neispravan);
		$criteria->compare('Komande',$this->Komande);
		$criteria->compare('Napomena',$this->Napomena,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ZamenaAlata the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
