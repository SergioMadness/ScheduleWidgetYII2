<?php

namespace professionalweb\ScheduleWidget\plugins;

class PluginTree extends Plugin
{

    public function init()
    {
        $this->tag                = 'gantt-tree';
        $this->options['enabled'] = 'true';

        parent::init();
    }
}