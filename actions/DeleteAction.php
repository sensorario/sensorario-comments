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

        $success = SensorarioCommentsModel::model()
          ->findByPk($id)
          ->delete();

        $category = 'SensorariocommentsModule.app';
        $messageToTranslate = 'Comment was not deleted.';
        $message = Yii::t($category, $messageToTranslate);

        $thread = $request->getPost('thread');

        $recenti = SensorarioCommentsModel::model()
          ->thread($thread)
          ->recenti()
          ->findAll();


        if (isset($recenti[2])) {
            $isOwner = Yii::app()->user->name === $comment->user;

            $params = array(
              'comment' => $comment,
              'isOwner' => $isOwner
            );

            $errorCode = 1;
            $comment = $recenti[2];
            $controller = $this->getController();
            $recente = $controller->renderPartial('_item', $params, true);
        } else {

            $category = 'SensorariocommentsModule.app';
            $messageToTranslate = 'There are no old messages to show.';
            $message = Yii::t($category, $messageToTranslate);

            $errorCode = 2;
            $success = false;
            $comment = null;
            $recente = null;
            $isOwner = false;
        }

        $json = array(
          'post' => $_POST,
          'get' => $_GET,
          'success' => $success,
          'message' => $message,
          'recente' => $recente,
          'errorCode' => $errorCode,
        );

        echo json_encode($json);

        Yii::app()->end();

    }

}