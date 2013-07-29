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
class StatsAction extends CAction
{

    /**
     * Run method.
     * 
     * @return boolean true
     */
    public function run()
    {

        $request = Yii::app()->request;

        $thread = $request->getPost('thread');

        $comments = SensorarioCommentsModel::model()
          ->thread($thread)
          ->findAll();

        $totThreadComments = count($comments);

        $messageToTranslate = 'Statistics unavailable.';
        $category = 'SensorariocommentsModule.app';
        $message = Yii::t($category, $messageToTranslate);

        $json = array(
          'request' => $request,
          'success' => true,
          'message' => $message,
          'error' => null,
          'tot_thread_comments' => $totThreadComments,
        );

        echo json_encode($json);

        Yii::app()->end();

        return true;

    }

}