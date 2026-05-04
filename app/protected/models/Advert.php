<?php

class Advert extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'adverts';
    }

    public function relations()
    {
        return [
            'realtor' => [self::BELONGS_TO, 'Realtor', 'realtor_id'],
        ];
    }
}
