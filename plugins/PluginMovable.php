<?php

namespace professionalweb\ScheduleWidget\plugins;

class PluginMovable extends Plugin
{

    public function init()
    {
        $this->tag                = 'gantt-movable';
        $this->options['enabled'] = 'true';

        parent::init();
    }
}