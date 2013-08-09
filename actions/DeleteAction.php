<?php

/**
 * This is action file for update action
 * 
 * PHP version 5
 *
 * @category Action
 * @package  Sensorario\Modules\SensorarioComments\Actions
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  GIT: 2.1
 * @link     https://github.com/sensorario/sensorariocomments github repository
 * 
 */


/**
 * This is action file for update action
 * 
 * @category Action
 * @package  Sensorario\Modules\SensorarioComments\Actions
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.1
 * @link     https://github.com/sensorario/sensorariocomments github repository
 * 
 */
class DeleteAction extends CAction
{
    
    /**
     * Run method.
     * 
     * @return boolean true
     */
    public function run()
    {

        $request = Yii::app()->request;

        $id = $request->getPost('id');

        $comment = SensorarioCommentsModel::model()
            ->findByPk($id);

        $success = $comment->delete();

        $category = 'SensorariocommentsModule.app';
        $messageToTranslate = 'Comment was not deleted.';
        $message = Yii::t($category, $messageToTranslate);

        $json = array(
            'post' => $_POST,
            'get' => $_GET,
            'success' => $success,
            'message' => $message,
        );

        echo json_encode($json);

        Yii::app()->end();

    }

}