<?php

/**
 * This controller collect all ajax requests
 * 
 * PHP version 5
 * 
 * @category Controller
 * @package  Sensorario\Modules\SensorarioComments\Controllers
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  GIT: 2.3
 * @link     https://github.com/sensorario/sensorariocomments github repository
 */


/**
 * This controller collect all ajax requests
 * 
 * @category Controller
 * @package  Sensorario\Modules\SensorarioComments\Controllers
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.3
 * @link     https://github.com/sensorario/sensorariocomments github repository
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
     * 
     * @return array List of action classes
     */
    public function actions()
    {

        return array(
            'stats' => 'sensorariocomments.actions.StatsAction',
            'delete' => 'sensorariocomments.actions.DeleteAction',
            'save' => 'sensorariocomments.actions.SaveAction',
            'latest' => 'sensorariocomments.actions.LatestAction',
            'update' => 'sensorariocomments.actions.UpdateAction',
        );

    }

}
