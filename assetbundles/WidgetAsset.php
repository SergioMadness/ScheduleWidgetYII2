<?php

namespace datalayerru\ScheduleWidget\assetbundles;

use yii\web\AssetBundle;

class WidgetAsset extends AssetBundle
{
    public $sourcePath = '@vendor/datalayerru/schedule-widget-yii2/assets';
    public $css        = [
        'css/angular-gantt.min.css',
        'css/angular-gantt-plugins.css'
    ];
    public $js         = [
        'js/angular-moment/moment-with-locales.min.js',
        'js/angular-moment/angular-moment.min.js',
        'js/angular-gantt/dist/angular-gantt.min.js',
        'js/angular-gantt/dist/angular-gantt-plugins.min.js',
        'js/app.js'
    ];

}