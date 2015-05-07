var scheduleWidget = angular.module('scheduleWidget', ['gantt', 'gantt.table', 'gantt.movable', 'gantt.tooltips', 'gantt.tree',
    'gantt.groups', 'gantt.overlap', 'gantt.progress', 'gantt.bounds', 'gantt.resizeSensor']);

scheduleWidget.filter('unsafe', HTMLFilter);

scheduleWidget.controller('mainGantt', function ($scope) {
    var self = this;
    self.listeners = new Array();

    self.addListener = function (method, listener) {
        self.listeners[method] = new Array();
        self.listeners[method].push(listener);
    };

    if (events) {
        for (eventitem in events) {
            self.addListener(eventitem, events[eventitem]);
        }
    }

    $scope.data = [
        {name: 'row1', tasks: [
                {name: 'task1', from: new Date(2015, 3, 16, 18, 0, 0), to: new Date(2015, 3, 19, 18, 0, 0)},
                {name: 'task2', from: new Date(2015, 4, 19, 18, 0, 0), to: new Date(2015, 4, 20, 18, 0, 0)}
            ]
        }
    ];

    $scope.timeFrames = {};

    $scope.dateFrames = {};

    if (timeFrames) {
        $scope.timeFrames = timeFrames;
    }

    if (dateFrames) {
        for (var dateFrame in dateFrames) {
            if (dateFrames[dateFrame].start) {
                dateFrames[dateFrame].start = moment(dateFrames[dateFrame].start, "YYYY MM DD");
            }
            if (dateFrames[dateFrame].end) {
                dateFrames[dateFrame].end = moment(dateFrames[dateFrame].end, "YYYY MM DD");
            }
            if (dateFrames[dateFrame].date) {
                dateFrames[dateFrame].date = moment(dateFrames[dateFrame].date, "YYYY MM DD");
            }
        }
        $scope.dateFrames = dateFrames;
    }

    $scope.registerApi = function (api) {
        api.core.on.ready($scope, function () {
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
            api.tasks.on.moveEnd($scope, function (task) {
                self.triggerEvent('tasks.on.moveEnd', task);
            });
            api.tasks.on.resizeEnd($scope, function (task) {
                self.triggerEvent('tasks.on.resizeEnd', task);
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
                        console.log('dom.tasks.on.click');
                        self.triggerEvent('dom.tasks.on.click', directiveScope.task);
                    });
                    element.bind('dblclick', function (event) {
                        event.stopPropagation();
                        console.log('dom.tasks.on.dblclick');
                        self.triggerEvent('dom.tasks.on.dblclick', directiveScope.task);
                    });
                }
                if (directiveName === 'ganttRow') {
                    element.bind('click', function (event) {
                        event.stopPropagation();
                        console.log('dom.row.on.click');
                        self.triggerEvent('dom.row.on.click', directiveScope.row);
                    });
                }
                if (directiveName === 'ganttRowLabel') {
                    element.bind('click', function () {
                        console.log('dom.row.on.labelclick');
                        self.triggerEvent('dom.row.on.labelclick', directiveScope.row);
                    });
                }
            });

            if (ganttData) {
                $scope.data = ganttData;
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