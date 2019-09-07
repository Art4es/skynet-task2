<?php


namespace Skynet\database;


use Skynet\models\Tarif;

class TarifRepository
{
    /**
     * @param $id
     * @return Tarif[]
     */
    public static function getById($id): array
    {
        $query = <<<SQL
        select * from tarifs
        where ID = $id
SQL;
        $query_data = DB::getConnection()->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        $tarifs = [];
        foreach ($query_data as $row) {
            $tarifs[] = new Tarif($row);
        }
        return $tarifs;
    }

    /**
     * @param $tarif_group_id
     * @return Tarif[]
     */
    public static function getByGroupId($tarif_group_id)
    {
        $query = <<<SQL
        select * from tarifs
        where tarif_group_id = $tarif_group_id
SQL;
        $query_data = DB::getConnection()->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        $tarifs = [];
        foreach ($query_data as $row) {
            $tarifs[] = new Tarif($row);
        }
        return $tarifs;
    }
}