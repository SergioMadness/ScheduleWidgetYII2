<?php

namespace datalayerru\ScheduleWidget\assetbundles;

use yii\web\AssetBundle;

class UITreeAsset extends AssetBundle
{
    public $sourcePath = '@bower/angular-ui-tree/dist/';
    public $css        = [
        'angular-ui-tree.min.css'
    ];
    public $js         = [
        'angular-ui-tree.min.js'
    ];
    public $depends    = [
        'yii\web\YiiAsset'
    ];

}