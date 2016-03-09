<?php

namespace professionalweb\ScheduleWidget\plugins;

class PluginResizeSensor extends Plugin
{

    public function init()
    {
        $this->tag                = 'gantt-resize-sensor';
        $this->options['enabled'] = 'true';

        parent::init();
    }
}