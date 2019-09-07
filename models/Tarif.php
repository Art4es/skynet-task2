<?php


namespace Skynet\models;


class Tarif
{
    public $id;
    public $title;
    public $price;
    public $link;
    public $speed;
    public $pay_period;
    public $tarif_group_id;

    public function __construct($data = [])
    {
        $this->id = isset($data['ID']) ? intval($data['ID']) : null;
        $this->title = isset($data['title']) ? strval($data['title']) : null;
        $this->price = isset($data['price']) ? floatval($data['price']) : null;
        $this->link = isset($data['link']) ? strval($data['link']) : null;
        $this->speed = isset($data['speed']) ? intval($data['speed']) : null;
        $this->pay_period = isset($data['pay_period']) ? intval($data['pay_period']) : null;
        $this->tarif_group_id = isset($data['tarif_group_id']) ? intval($data['tarif_group_id']) : null;
    }

    public function getNewPayDate(): \DateTimeImmutable
    {
        $current_date = new \DateTimeImmutable();
        $current_midnight = $current_date->setTime(0, 0, 0, 0);
        return $current_midnight->add(new \DateInterval("P{$this->pay_period}M"));
    }

    public function getNewPayday(): string
    {
        $current_midnight = $this->getNewPayDate();
        return $current_midnight->getTimestamp() . $current_midnight->format('O');
    }

    public function shortArrayView()
    {
        return [
            'title' => $this->title,
            'link' => $this->link,
            'speed' => $this->speed,
        ];
    }

    public function extendedArrayView()
    {
        return [
            'ID' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'speed' => $this->speed,
            'pay_period' => $this->pay_period,
            'new_payday' => $this->getNewPayday()
        ];
    }
}