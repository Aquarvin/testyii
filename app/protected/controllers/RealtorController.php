<?php

class RealtorController extends CController
{
    public function actionView()
    {
        $realtor = Realtor::model()->findByPk(1);

        if ($realtor === null) {
            throw new CHttpException(404, 'Ріелтора не знайдено.');
        }

        $adverts = Advert::model()->findAllByAttributes(
            ['realtor_id' => $realtor->id],
            ['order' => 'created_at DESC']
        );

        $listings = [];
        foreach ($adverts as $advert) {
            $row          = $advert->attributes;
            $row['price'] = number_format((float) $advert->price, 0, ',', ' ');
            $listings[]   = $row;
        }

        Yii::app()->clientScript->registerScriptFile(
            'https://cdn.tailwindcss.com',
            CClientScript::POS_HEAD
        );
        Yii::app()->clientScript->registerCssFile(
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css'
        );

        $this->render('view', [
            'realtor'  => $realtor->attributes,
            'listings' => $listings,
        ]);
    }
}
