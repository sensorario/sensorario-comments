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
 * @version  GIT: 2.3
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
 * @version  Release: 2.3
 * @link     https://github.com/sensorario/sensorariocomments github repository
 * 
 */
class SaveAction extends CAction
{

    /**
     * Run method.
     * 
     * @return boolean true
     */
    public function run()
    {

        $request = Yii::app()->request;

        $sensorarioCommento = new SensorarioCommentsModel();
        $sensorarioCommento->thread = $request->getPost('thread');
        $sensorarioCommento->comment = $request->getPost('commento');
        $sensorarioCommento->user = Yii::app()->user->name;
        $sensorarioCommento->datetime = date('Y-m-d H:i:s');

        $message = '';
        $success = $sensorarioCommento->save();


        if ($success) {
            $category = 'SensorariocommentsModule.app';
            $messageToTranslate = 'Message successful saved.';
            $message = Yii::t($category, $messageToTranslate);
        } else {
            foreach ($sensorarioCommento->errors as $errore) {
                $message .= "\n" . $errore[0];
            }
        }

        $params = array(
          'isOwner' => Yii::app()->user->name === $sensorarioCommento->user,
          'comment' => $sensorarioCommento
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
