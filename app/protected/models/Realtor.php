<?php

class Realtor extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'realtors';
    }

    public function relations()
    {
        return [
            'adverts' => [self::HAS_MANY, 'Advert', 'realtor_id'],
        ];
    }
}
