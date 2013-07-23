<?php

/**
 * This controller collect all ajax requests
 * 
 * @package Sensorario\Modules\SensorarioComments\Controllers
 */
class AjaxSensorarioCommentsController extends Controller
{

    /**
     * Filter method.
     * 
     * @return array
     */
    public function filters()
    {

        return array(
            'postOnly + stats, index, save, delete'
        );

    }

    /**
     * Actions methos.
     */
    public function actions()
    {
        return array(
            'stats' => 'sensorariocomments.actions.StatsAction',
            'delete' => 'sensorariocomments.actions.DeleteAction',
            'save' => 'sensorariocomments.actions.SaveAction',
            'latest' => 'sensorariocomments.actions.LatestAction',
        );

    }

}
