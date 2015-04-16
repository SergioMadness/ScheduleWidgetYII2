<?php

namespace datalayerru\ScheduleWidget\plugins;

class PluginTooltip extends Plugin
{

    public function init()
    {
        $this->tag                = 'gantt-tooltips';
        $this->options['enabled'] = 'true';

        parent::init();
    }
}