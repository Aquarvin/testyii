<?php

class SiteController extends CController
{
    public function actionIndex()
    {
        $dbStatus = 'disconnected';
        try {
            Yii::app()->db->active = true;
            $dbStatus = 'connected';
        } catch (Exception $e) {
            $dbStatus = 'error: ' . $e->getMessage();
        }

        $this->render('index', ['dbStatus' => $dbStatus]);
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            $this->render('error', ['error' => $error]);
        }
    }
}
