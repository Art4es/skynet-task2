<?php


namespace Skynet\actions;


use Skynet\database\ServiceRepository;
use Skynet\database\TarifRepository;
use Skynet\http\IResponse;
use Skynet\http\JsonResponse;

class TarifsAction extends Action
{
    public function run(): IResponse
    {
        try {
            $service_id = $this->params['service_id'];
            $user_id = $this->params['user_id'];

            $services = ServiceRepository::getByIdAndUserId($service_id, $user_id);

            $result = [];
            foreach ($services as $service) {
                $tarif_obj = TarifRepository::getById($service->tarif_id)[0];
                $tarifs = TarifRepository::getByGroupId($tarif_obj->tarif_group_id);
                $tarifs_array = [];
                foreach ($tarifs as $tarif) {
                    $tarifs_array[] = $tarif->extendedArrayView();
                }
                $result[] = array_merge($tarif_obj->shortArrayView(), ['tarifs' => $tarifs_array]);
            }
        } catch (\Exception $e) {
            return new JsonResponse(['result' => 'error']);
        }
        return new JsonResponse(['result' => 'ok', 'tarifs' => $result]);
    }
}