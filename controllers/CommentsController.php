<?php

/**
 * @author Simone Gentili <sensorario@gmail.com>
 */
class CommentsController extends Controller
{

    /**
     * 
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