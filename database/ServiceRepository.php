<?php


namespace Skynet\database;


use Skynet\models\Service;

class ServiceRepository
{
    /**
     * @param $service_id
     * @param $user_id
     * @return Service[]
     */
    public static function getByIdAndUserId($service_id, $user_id): array
    {
        $query = <<<SQL
        select * from services
        where user_id = $service_id
        and ID = $user_id
SQL;
        $data = DB::getConnection()->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        $services = [];
        foreach ($data as $row) {
            $services[] = new Service($row);
        }
        return $services;
    }

    public static function update(Service $service): bool
    {
        $query = <<<SQL
        update services set 
        tarif_id = {$service->tarif_id}, 
        payday = '{$service->payday}'
        where ID = {$service->id}
SQL;
        return DB::getConnection()->prepare($query)->execute();
    }
}