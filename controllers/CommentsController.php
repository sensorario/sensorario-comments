<?php

/**
 * @author Simone Gentili <sensorario@gmail.com>
 * @version 1.0
 */
class CommentsController extends Controller
{

    /**
     * This method save comments.
     */
    public function actionSaveNew()
    {
        $now = new DateTime();

        $comment = new SensorarioComments();
        $comment->comment = $_POST['comment'];
        $comment->semantic_id = $_POST['semantic_id'];
        $comment->datetime = $now->format('Y-m-d H:i:s');
        $comment->user = Yii::app()->user->id;
        $comment->save();

        echo json_encode(true);

        Yii::app()->end();
    }

    /**
     * This method get number of comments and all comments to show
     * in the front-end.
     * 
     * @param string $semanticId
     */
    public function actionNumber($semanticId)
    {
        $totaleCommenti = $contatore = count(SensorarioComments::model()->findAll(array(
                    'condition' => 'semantic_id=:semanticId',
                    'params' => array(
                        ':semanticId' => $semanticId
                    )
                )));

        $arrayCommensForJsonResponse = array();

        $criteria = array(
            'condition' => 'semantic_id="' . $semanticId . '"',
            'order' => 'id ASC'
        );

        foreach (SensorarioComments::model()->findAll($criteria) as $comment) {
            $arrayCommensForJsonResponse[$contatore]['comment'] = $comment->comment;
            $arrayCommensForJsonResponse[$contatore]['user'] = $comment->user;
            $arrayCommensForJsonResponse[$contatore]['datetime'] = $comment->datetime;
            $contatore = $contatore - 1;
        }

        echo json_encode(array(
            'commenti' => $arrayCommensForJsonResponse,
            'totaleCommenti' => $totaleCommenti
        ));

        Yii::app()->end();
    }

}