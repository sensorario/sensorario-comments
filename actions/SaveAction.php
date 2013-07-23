<?php

/**
 * This action save new comment.
 */
class SaveAction extends CAction
{

    /**
     * Run method.
     */
    public function run()
    {

        $request = Yii::app()->request;

        $sensorarioCommento = new SensorarioCommentsModel();
        $sensorarioCommento->thread = $request->getPost('thread');
        $sensorarioCommento->comment = $request->getPost('commento');
        $sensorarioCommento->user = Yii::app()->user->name;

        $message = '';
        $success = $sensorarioCommento->save();
        if ($success) {
            $message = 'Messaggio salvato con successo.';
        } else {
            foreach ($sensorarioCommento->errors as $errore) {
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
                'comment' => $sensorarioCommento), true),
        ));

        Yii::app()->end();

    }

}