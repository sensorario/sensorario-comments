<?php

/**
 * This action update comment.
 */
class UpdateAction extends CAction
{

    /**
     * Run method.
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
            $message = 'Messaggio aggiornato con successo.';
        } else {
            foreach ($commento->errors as $errore) {
                $message .= "\n" . $errore[0];
            }
        }

        echo json_encode(array(
            'post' => $_POST,
            'get' => $_GET,
            'success' => $success,
            'message' => $message,
            'error' => null,
            'html' => $this->getController()->renderPartial('_item', array(
                'isOwner' => Yii::app()->user->name === $commento->user,
                'comment' => $commento), true),
        ));

        Yii::app()->end();

    }

}