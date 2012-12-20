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
        $comment->attributes = $_POST['SensorarioModuleComment'];
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
        try {
            $totaleCommenti = $contatore = count(SensorarioComments::model()->findAll(array(
                        'condition' => 'semantic_id=:semanticId',
                        'params' => array(
                            ':semanticId' => $semanticId
                        )
                    )));
        } catch (Exception $e) {
            echo json_encode(array(
                'message' => $e->getMessage()
            ));
            Yii::app()->end();
        }

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