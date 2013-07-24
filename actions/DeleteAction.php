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
        
        $message = 'Comment was not deleted.';
        
        $thread = $request->getPost('thread');

        $recenti = SensorarioCommentsModel::model()
                ->thread($thread)
                ->recenti()
                ->findAll();
        
        
        if(isset($recenti[2])) {
          $errorCode = 1;
          $comment = $recenti[2];
          $isOwner = Yii::app()->user->name === $comment->user;
          $recente = $this->getController()->renderPartial('_item', array(
                'comment' => $comment,
                'isOwner' => $isOwner
          ), true);
        } else {
          $errorCode = 2;
          $success = false;
          $message = 'There are no old messages to show.';
          $comment = null;
          $recente = null;
          $isOwner = false;
        }
        
        echo json_encode(array(
            'post' => $_POST,
            'get' => $_GET,
            'success' => $success,
            'message' => $message,
            'recente' => $recente,
            'errorCode' => $errorCode,
        ));

        Yii::app()->end();

    }

}