<?php

namespace datalayerru\ScheduleWidget\plugins;

class PluginOverlap extends Plugin
{

    public function init()
    {
        $this->tag                = 'gantt-overlap';
        $this->options['enabled'] = 'true';

        parent::init();
    }
}