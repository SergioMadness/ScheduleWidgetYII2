<?php

namespace professionalweb\ScheduleWidget\plugins;

use yii\helpers\Html;

class Plugin extends \yii\base\Widget
{
    public $tag     = '';
    public $options = [];

    public function init()
    {
        parent::init();
        echo Html::beginTag($this->tag, $this->options)."\n";
    }

    public function run()
    {
        echo Html::endTag($this->tag)."\n";
    }
}