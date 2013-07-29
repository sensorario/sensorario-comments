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
class UpdateAction extends CAction
{

    /**
     * Run method.
     * 
     * @return boolean true
     */
    public function run()
    {

        $request = Yii::app()->request;

        $commento = SensorarioCommentsModel::model()
          ->findByPk($request->getPost('id'));

        $commento->thread = $request->getPost('thread');
        $commento->comment = $request->getPost('commento');
        $commento->user = Yii::app()->user->name;

        $message = '';
        $success = $commento->save();
        if ($success) {
            $category = 'SensorariocommentsModule.app';
            $messageToTranslate = 'Message successful updated.';
            $message = Yii::t($category, $messageToTranslate);
        } else {
            foreach ($commento->errors as $errore) {
                $message .= "\n" . $errore[0];
            }
        }

        $params = array(
          'isOwner' => Yii::app()->user->name === $commento->user,
          'comment' => $commento
        );

        $html = $this->getController()->renderPartial('_item', $params, true);

        $json = array(
          'post' => $_POST,
          'get' => $_GET,
          'success' => $success,
          'message' => $message,
          'error' => null,
          'html' => $html,
        );

        echo json_encode($json);

        Yii::app()->end();

        return true;

    }

}