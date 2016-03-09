<?php

namespace professionalweb\ScheduleWidget\plugins;

class PluginTable extends Plugin
{

    public function init()
    {
        $this->tag                = 'gantt-table';
        $this->options['enabled'] = 'true';

        parent::init();
    }
}