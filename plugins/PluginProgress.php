<?php

namespace datalayerru\ScheduleWidget\plugins;

class PluginProgress extends Plugin
{

    public function init()
    {
        $this->tag                = 'gantt-progress';
        $this->options['enabled'] = 'true';

        parent::init();
    }
}