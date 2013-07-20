<?php

/**
 * @package Sensorario\Modules\SensorarioComments\Controllers
 */
class AjaxSensorarioCommentsController extends Controller
{

    public function filters() {

        return array(
            'postOnly + stats, index'
        );

    }

    public function actionStats() {

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

    public function actionSave() {

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
            'html' => $this->renderPartial('_item', array(
                'comment' => $sensorarioCommento), true),
        ));

        Yii::app()->end();

    }

    public function actionLatest() {

        $request = Yii::app()->request;

        $thread = $request->getPost('thread');

        $comments = SensorarioCommentsModel::model()
                ->thread($thread)
                ->recenti()
                ->findAll();

        $html = '';
        foreach ($comments as $comment) {
            $html = $this->renderPartial('_item', array(
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
