<?php


namespace Skynet\models;


class Service
{
    public $id;
    public $user_id;
    public $tarif_id;
    public $payday;

    public function __construct($data = [])
    {
        $this->id = isset($data['ID']) ? intval($data['ID']) : null;
        $this->user_id = isset($data['user_id']) ? intval($data['user_id']) : null;
        $this->tarif_id = isset($data['tarif_id']) ? intval($data['tarif_id']) : null;
        $this->payday = isset($data['payday']) ? strval($data['payday']) : null;
    }
}