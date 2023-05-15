<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var \yii\web\View $this */
/** @var string|integer $userId */
/** @var array|string $extendUrl */
/** @var integer $warnBefore */
/** @var array|string $logoutUrl */
?>

<div id="session-warning-modal" class="modal fade" style="width:100%; text-align: center;" tabindex="-1" role="dialog" data-warn-before="<?= $warnBefore; ?>" data-user-id="<?= $userId; ?>" data-extend-url="<?= Url::to($extendUrl); ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="message"></div>
            </div>
            <div class="modal-footer">
                <?php if ($logoutUrl) {
                    if ($logoutUrlIsPost) {
                        echo Html::a(Yii::t('mgcode/sessionWarning', 'Logout'), Url::to($logoutUrl), ['data-method' => 'POST']);
                    } else {
                        echo Html::a(Yii::t('mgcode/sessionWarning', 'Logout'), Url::to($logoutUrl));
                    }
                } ?>
                <button type="button" class="btn btn-success continue"><?= Yii::t('mgcode/sessionWarning', 'Continue') ?></button>
            </div>
        </div>
    </div>
</div>

<?php
\mgcode\sessionWarning\assets\SessionWarningAsset::register($this)
    ->initPlugin($this, [
        'logoutUrl' => $logoutUrl,
    ]);
