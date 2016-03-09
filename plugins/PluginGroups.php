<?php

namespace professionalweb\ScheduleWidget\plugins;

class PluginGroups extends Plugin
{

    public function init()
    {
        $this->tag                = 'gantt-groups';
        $this->options['enabled'] = 'true';

        parent::init();
    }
}