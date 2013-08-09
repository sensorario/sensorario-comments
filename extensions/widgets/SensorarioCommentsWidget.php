<?php

/**
 * Widget to show comments
 * 
 * PHP version 5
 * 
 * @category Widgets
 * @package  Sensorario\Modules\SensorarioComments\Extensions\Widgets
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  GIT: 2.3
 * @link     https://github.com/sensorario/sensorariocomments github repository
 */


/**
 * Widget that show comments in view page.
 * 
 * @category Widgets
 * @package  Sensorario\Modules\SensorarioComments\Extensions\Widgets
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.3
 * @link     https://github.com/sensorario/sensorariocomments github repository
 */
class SensorarioCommentsWidget extends CWidget
{

    /**
     * This string identify an entire thread of comments.
     *
     * @var string
     */
    public $thread;

    public $assetImage;

    /**
     * Init method.
     * 
     * @return null This class dont return anithing
     */
    public function init()
    {

        Yii::app()->getClientScript()->registerCoreScript('jquery');

        $this->getJavascriptUrls();

        $comments = file_get_contents(__DIR__ . '/comments.js');
        $functions = file_get_contents(__DIR__ . '/functions.js');
        $urls = $this->getJavascriptUrls();

        Yii::app()
            ->getClientScript()
            ->registerScript('urls', $urls, CClientScript::POS_HEAD)
            ->registerScript('comm', $comments, CClientScript::POS_HEAD)
            ->registerScript('func', $functions, CClientScript::POS_HEAD);

        $this->assetImage = Yii::app()
            ->getAssetManager()
            ->publish(__DIR__ . '/images/ajax-loader.gif');

    }

    /**
     * This method init all urls to send to javascript functions.
     * 
     * @return string Urls var.
     */
    public function getJavascriptUrls()
    {

        $urls = '';

        $controller = '/sensorariocomments/ajaxSensorarioComments/';

        $urlNames = array(
            'save',
            'stats',
            'latest'
        );

        $params = array(
            'thread' => $this->thread
        );

        foreach ($urlNames as $link) {
            $route = $controller . $link;
            $url = Yii::app()->createUrl($route, $params);
            $urls .= "\nvar url_{$link} = \"{$url}\";";
        }

        return $urls;

    }

    /**
     * Run method.
     * 
     * @return null This method dont return any value.
     */
    public function run()
    {

        $params = array(
            'thread' => $this->thread,
            'assetImage' => $this->assetImage,
        );

        $this->render('sensorario-comments', $params);

    }

}
