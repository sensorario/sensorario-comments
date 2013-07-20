<?php

/**
 * This is the model class for table "sensorario_comments".
 *
 * The followings are the available columns in table 'sensorario_comments':
 * @property integer $id
 * @property string $semantic_id
 * @property string $datetime
 * @property string $user
 * @property string $comment
 */
class SensorarioComments extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SensorarioComments the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'sensorario_comments';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('semantic_id, user, datetime, user, comment', 'required'),
            array('semantic_id', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, semantic_id, datetime, user, comment', 'safe', 'on' => 'search'),
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
            'semantic_id' => 'Semantic',
            'datetime' => 'Datetime',
            'user' => 'User',
            'comment' => 'Comment',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('semantic_id', $this->semantic_id, true);
        $criteria->compare('datetime', $this->datetime, true);
        $criteria->compare('user', $this->user);
        $criteria->compare('comment', $this->comment, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}