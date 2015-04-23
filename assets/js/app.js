var scheduleWidget = angular.module('scheduleWidget', ['gantt', 'gantt.table', 'gantt.movable', 'gantt.tooltips', 'gantt.tree',
    'gantt.groups', 'gantt.overlap']);

scheduleWidget.controller('mainGantt', function ($scope) {
    var self = this;
    self.listeners = new Array();

    self.addListener = function (method, listener) {
        self.listeners[method] = new Array();
        self.listeners[method].push(listener);
    };

    if (events) {
        for (event in events) {
            self.addListener(event, events[event]);
        }
    }

    $scope.data = [
        {name: 'row1', tasks: [
                {name: 'task1', from: new Date(2015, 3, 16, 18, 0, 0), to: new Date(2015, 3, 19, 18, 0, 0)},
                {name: 'task2', from: new Date(2015, 4, 19, 18, 0, 0), to: new Date(2015, 4, 20, 18, 0, 0)}
            ]
        }
    ];

    if (ganttData) {
        $scope.data = ganttData;
    }

    $scope.registerApi = function (api) {
        //tasks' events
        api.tasks.on.add($scope, function (task) {
            self.triggerEvent('tasks.on.add', task);
        });
        api.tasks.on.change($scope, function (task) {
            self.triggerEvent('tasks.on.change', task);
        });
        api.tasks.on.remove($scope, function (task) {
            self.triggerEvent('tasks.on.remove', task);
        });
        api.tasks.on.rowChange($scope, function (task) {
            self.triggerEvent('tasks.on.rowChange', task);
        });
        //core's events
        api.core.on.ready($scope, function (api) {
            self.triggerEvent('core.on.ready', api);
        });
        api.core.on.rendered($scope, function (api) {
            self.triggerEvent('core.on.rendered', api);
        });
        //data's events
        api.data.on.change($scope, function (newData, oldData) {
            self.triggerEvent('data.on.change', newData, oldData);
        });

        //dom events
        api.directives.on.new($scope, function (directiveName, directiveScope, element) {
            if (directiveName === 'ganttTask') {
                element.bind('click', function (event) {
                    event.stopPropagation();
                    self.triggerEvent('dom.tasks.on.click', directiveScope.task);
                });
                element.bind('dblclick', function (event) {
                    event.stopPropagation();
                    self.triggerEvent('dom.tasks.on.dblclick', directiveScope.task);
                });
            }
        });
    };

    self.triggerEvent = function (eventName, param, param2) {
        for (listener in self.listeners) {
            if (listener === eventName) {
                if (self.listeners[listener].length > 0) {
                    for (var i = 0; i < self.listeners[listener].length; i++) {
                        self.listeners[listener][i](param, param2);
                    }
                }
            }
        }
    };
});