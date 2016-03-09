<?php

namespace professionalweb\ScheduleWidget\assetbundles;

use yii\web\AssetBundle;

class AngularAsset extends AssetBundle
{
    public $sourcePath = '@bower/angular';
    public $js         = [
        'angular.min.js'
    ];

}