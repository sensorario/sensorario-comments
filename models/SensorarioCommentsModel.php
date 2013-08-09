<?php

/**
 * This is the model class for table "sensorario_comments".
 * 
 * PHP version 5
 *
 * @category Model
 * @package  Sensorario\Modules\SensorarioComments\Models
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  GIT: 2.3
 * @link     https://github.com/sensorario/sensorariocomments github repository
 * 
 */


/**
 * This is the model class for table "sensorario_comments".
 * 
 * @category Model
 * @package  Sensorario\Modules\SensorarioComments\Models
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.3
 * @link     https://github.com/sensorario/sensorariocomments github repository
 * 
 * @property integer $id
 * @property string $thread
 * @property string $comment
 * @property string $user
 * @property string $datetime
 * 
 */
class SensorarioCommentsModel extends CActiveRecord
{

    /**
     * Table name.
     * 
     * @return string the associated database table name
     */
    public function tableName()
    {

        return 'sensorario_comments';

    }

    /**
     * List of rules.
     * 
     * @return array validation rules for model attributes.
     */
    public function rules()
    {

        return array(
          array('thread, user, comment', 'required'),
          array('thread', 'length', 'max' => 50),
          array('comment, user', 'safe'),
          array('id, thread, comment, user', 'safe', 'on' => 'search'),
        );

    }

    /**
     * List of relations.
     * 
     * @return array relational rules.
     */
    public function relations()
    {

        return array(
        );

    }

    /**
     * Attribute label list.
     * 
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {

        return array(
          'id' => 'ID',
          'thread' => 'Thread',
          'comment' => 'Comment',
          'user' => 'User',
          'datetime' => 'Date',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('thread', $this->thread, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('user', $this->user);
        $criteria->compare('datetime', $this->datetime);

        $arrayCriteria = array(
          'criteria' => $criteria,
        );

        return new CActiveDataProvider($this, $arrayCriteria);

    }

    /**
     * Returns the static model of the specified AR class.
     * 
     * Please note that you should have this exact method in all your
     * CActiveRecord descendants!
     * 
     * @param string $className active record class name.
     * 
     * @return SensorarioCommentsModel the static model class
     */
    public static function model($className = __CLASS__)
    {

        return parent::model($className);

    }

    /**
     * This scope provide all comments of a thread.
     * 
     * @param string $thread A string ID for a thread of comments
     * 
     * @return \SensorarioCommentsModel
     */
    public function thread($thread)
    {

        $criteria = array(
          'condition' => 'thread=:thread',
          'params' => array(
            ':thread' => $thread
          )
        );

        $this->getDbCriteria()->mergeWith($criteria);

        return $this;

    }

    /**
     * This scope provide al recent comments
     * 
     * @return \SensorarioCommentsModel
     */
    public function recenti()
    {

        $criteria = array(
          'order' => 'id desc',
          'limit' => 3
        );

        $this->getDbCriteria()->mergeWith($criteria);

        return $this;

    }

    /**
     * Escape the content of comment
     * 
     * @return string escaped comment
     */
    public function getEscapedComment()
    {

        return htmlentities($this->comment);

    }

    /**
     * The purpose of this method is to show date time.
     * 
     * @since 2.3
     * @return string The date and the time of comment.
     * 
     */
    public function getDate()
    {
        
        $dateTime = new DateTime($this->datetime);
        $format = 'd M Y';
        return $dateTime->format($format);
        
    }

}
