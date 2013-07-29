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
class LatestAction extends CAction
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
          ->recenti()
          ->findAll();

        $controller = $this->getController();

        $html = '';
        foreach ($comments as $comment) {
            $params = array(
              'comment' => $comment,
              'isOwner' => Yii::app()->user->name === $comment->user,
            );
            $html = $controller->renderPartial('_item', $params, true) . $html;
        }

        $json = array(
          'post' => $_POST,
          'get' => $_GET,
          'success' => false,
          'html' => $html
        );

        echo json_encode($json);

        Yii::app()->end();

        return true;

    }

}