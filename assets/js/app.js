var scheduleWidget = angular.module('scheduleWidget', ['gantt', 'gantt.table', 'gantt.movable', 'gantt.tooltips']);

scheduleWidget.controller('mainGantt', function ($scope) {
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
});