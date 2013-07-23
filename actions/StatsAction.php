<?php

class StatsAction extends CAction
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
                ->findAll();

        $totThreadComments = count($comments);

        echo json_encode(array(
            'request' => $request,
            'success' => true,
            'message' => 'Impossibile recuperare le statistiche.',
            'error' => null,
            'tot_thread_comments' => $totThreadComments,
        ));

        Yii::app()->end();

    }

}