<?php

/**
 * This action delete a comment.
 */
class DeleteAction extends CAction
{

    /**
     * Run method.
     */
    public function run()
    {

        $request = Yii::app()->request;

        $id = $request->getPost('id');

        $success = SensorarioCommentsModel::model()
                ->findByPk($id)
                ->delete();

        echo json_encode(array(
            'post' => $_POST,
            'get' => $_GET,
            'success' => $success,
            'message' => 'Comment was not deleted.'
        ));

        Yii::app()->end();

    }

}