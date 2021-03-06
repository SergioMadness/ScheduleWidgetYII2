<?php
/* @var $this yii\web\View */
/* @var $clientOptions array */
/* @var $plugins array */
/* @var $data string */

use yii\helpers\Html;
use professionalweb\ScheduleWidget\assetbundles\WidgetAsset;
use professionalweb\ScheduleWidget\assetbundles\MomentRangeAsset;

WidgetAsset::register($this);
MomentRangeAsset::register($this);
?>

<?php if ($data != ''): ?>
    <script>
        var ganttData =<?= $data ?>;
    </script>
<?php endif; ?>

<?php if ($events != ''): ?>
    <script>
        var events = new Array();
    <?= $events ?>
    </script>
<?php endif; ?>

<?php if ($timeFrames != ''): ?>
    <script>
        var timeFrames =<?= $timeFrames ?>;
    </script>
<?php endif; ?>

<?php if ($dateFrames != ''): ?>
    <script>
        var dateFrames =<?= $dateFrames ?>;
    </script>
<?php endif; ?>

<div ng-app="scheduleWidget" ng-controller="mainGantt">
    <?= Html::beginTag('div', $clientOptions) ?>
    <?= $plugins ?>
    <?= Html::endTag('div') ?>
</div>