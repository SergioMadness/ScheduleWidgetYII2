<?php

namespace datalayerru\ScheduleWidget\assetbundles;

use yii\web\AssetBundle;

class MomentRangeAsset extends AssetBundle
{
    public $sourcePath = '@bower/moment-range/lib/';
    public $js         = [
        'moment-range.min.js',
    ];
    public $depends = [
        'datalayerru\ScheduleWidget\assetbundles\WidgetAsset'
    ];

}