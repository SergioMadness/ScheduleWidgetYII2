<?php

namespace datalayerru\ScheduleWidget\plugins;

class PluginBounds extends Plugin
{

    public function init()
    {
        $this->tag                = 'gantt-bounds';
        $this->options['enabled'] = 'true';

        parent::init();
    }
}