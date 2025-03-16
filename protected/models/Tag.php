<?php

/**
 * This is the model class for table "{{tag}}".
 *
 * The followings are the available columns in table '{{tag}}':
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 */
class Tag extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tag}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('frequency', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, frequency', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Name',
			'frequency' => 'Frequency',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('frequency',$this->frequency);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tag the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * 
	 * TODOs (Added)
	 * 
	 */

	public static function string2array($tags)
	{
		return preg_split('/\s*,\s*/',trim($tags),-1,PREG_SPLIT_NO_EMPTY);
	}
	
	public static function array2string($tags)
	{
		return implode(', ',$tags);
	}

	// public function findTagWeights($maxTags=20)
	// {
	// 	$criteria = new CDbCriteria();
	// 	$criteria->limit = $maxTags;
	// 	$tags = Tag::model()->findAll($criteria);
	// 	$tagWeight = array();
	// 	foreach($tags as $tag)
	// 	{
	// 		$weight = $tag->frequency+8;
	// 		$weight = $weight>=12 ? 12 : $weight;
	// 		$tagWeight[$tag->name] = $weight;
	// 	}
	// 	echo "afljknasdjsa";
	// 	var_dump($tagWeight);exit;
	// 	return $tagWeight;
	// }

	public function findTagWeights($maxTags = 20)
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'frequency DESC'; // Order by most used tags
		$criteria->limit = $maxTags;
	
		$tags = Tag::model()->findAll($criteria);
		$tagData = array();
	
		// Find max frequency for dynamic scaling
		$maxFrequency = 0;
		foreach ($tags as $tag) {
			if ($tag->frequency > $maxFrequency) {
				$maxFrequency = $tag->frequency;
			}
		}
	
		foreach ($tags as $tag) {
			// Normalize weight between 8 and 12
			$weight = 8 + round(($tag->frequency / max($maxFrequency, 1)) * 4);
			$tagData[$tag->name] = [
				'weight' => min($weight, 12), // Ensure weight doesn't exceed 12
				'frequency' => $tag->frequency // Store actual frequency
			];
		}
	
		return $tagData;
	}

	public function updateFrequency($oldTags, $newTags)
	{
		$oldTags=self::string2array($oldTags);
		$newTags=self::string2array($newTags);
		$this->addTags(array_values(array_diff($newTags,$oldTags)));
		$this->removeTags(array_values(array_diff($oldTags,$newTags)));
	}

	public function addTags($tags)
	{
		$criteria=new CDbCriteria;
		$criteria->addInCondition('name',$tags);
		$this->updateCounters(array('frequency'=>1),$criteria);
		foreach($tags as $name)
		{
			if(!$this->exists('name=:name',array(':name'=>$name)))
			{
				$tag=new Tag;
				$tag->name=$name;
				$tag->frequency=1;
				$tag->save();
			}
		}
	}

	public function removeTags($tags)
	{
		if(empty($tags))
			return;
		$criteria=new CDbCriteria;
		$criteria->addInCondition('name',$tags);
		$this->updateCounters(array('frequency'=>-1),$criteria);
		$this->deleteAll('frequency<=0');
	}
}
