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

        $html = '';
        foreach ($comments as $comment) {
            $html = $this->getController()->renderPartial('_item', array(
                        'comment' => $comment
                            ), true) . $html;
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