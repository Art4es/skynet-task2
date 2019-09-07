<?php


namespace Skynet\actions;


use Skynet\database\ServiceRepository;
use Skynet\database\TarifRepository;
use Skynet\http\IResponse;
use Skynet\http\JsonResponse;
use Skynet\http\Response;

class TarifAction extends Action
{
    public function run(): IResponse
    {
        try {
            $service_id = $this->params['service_id'];
            $user_id = $this->params['user_id'];
            $services = ServiceRepository::getByIdAndUserId($service_id, $user_id);
            if (empty($services)) {
                throw new \Exception('Services not found');
            }
            $tarif_id = $this->request->getParsedBody()['tarif_id'];
            if (empty($tarif_id) || intval($tarif_id) != $tarif_id) {
                throw new \Exception('Bad tarif id');
            }
            $tarif = TarifRepository::getById($tarif_id)[0];
            if (empty($tarif)) {
                throw new \Exception('Tarif not found');
            }
            foreach ($services as $service) {
                $service->tarif_id = $tarif->id;
                $service->payday = $tarif->getNewPayDate()->format('Y-m-d');
                $updated = ServiceRepository::update($service);
                if (!$updated) {
                    throw new \Exception('Not updated');
                }
            }
        } catch (\Exception $e) {
            return new JsonResponse(['result' => 'error']);
        }
        return new JsonResponse(['result' => 'ok']);
    }
}