<?php

namespace datalayerru\ScheduleWidget\assetbundles;

use yii\web\AssetBundle;

class CssElementQueriesAsset extends AssetBundle
{
    public $sourcePath = '@bower/css-element-queries/src';
    public $js         = [
        'ResizeSensor.js',
        'ElementQueries.js'
    ];

}