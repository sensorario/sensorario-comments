<?php

/**
 * This action show latest actions.
 */
class LatestAction extends CAction
{

    /**
     * Run method.
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

        echo json_encode(array(
            'post' => $_POST,
            'get' => $_GET,
            'success' => false,
            'html' => $html
        ));

        Yii::app()->end();

    }

}