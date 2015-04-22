var scheduleWidget = angular.module('scheduleWidget', ['gantt', 'gantt.table', 'gantt.movable', 'gantt.tooltips', 'gantt.tree',
    'gantt.groups', 'gantt.overlap']);

scheduleWidget.controller('mainGantt', function ($scope) {
    var self = this;
    self.listeners = new Array();

    self.addListener = function (method, listener) {
        self.listeners[method] = new Array();
        self.listeners[method].push(listener);
    };

    for (event in events) {
        self.addListener(event, events[event]);
    }

    $scope.data = [
        {name: 'row1', tasks: [
                {name: 'task1', from: new Date(2015, 3, 16, 18, 0, 0), to: new Date(2015, 3, 19, 18, 0, 0)},
                {name: 'task2', from: new Date(2015, 4, 19, 18, 0, 0), to: new Date(2015, 4, 20, 18, 0, 0)}
            ]
        }
    ];

    if (ganttData != null) {
        $scope.data = ganttData;
    }

    $scope.registerApi = function (api) {
        api.tasks.on.rowChange($scope, function (task) {
            self.triggerEvent('tasks.on.rowChange', task);
        });
    };

    self.triggerEvent = function (eventName, param) {
        for (listener in self.listeners) {
            if (listener === eventName) {
                if (self.listeners[listener].length > 0) {
                    for (var i = 0; i < self.listeners[listener].length; i++) {
                        self.listeners[listener][i](param);
                    }
                }
            }
        }
    };
});