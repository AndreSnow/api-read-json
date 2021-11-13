<?php

namespace App\Http\Controllers;

use App\Traits\FileJson;
use Illuminate\Http\Request;

class ProposalsController extends Controller
{
    use FileJson;

    protected $name_file;

    public function registerBeneficiariesByPlan(Request $request)
    {
        try {

            $this->writeJsonFile($request->input(), 'beneficiarios');
            $prices = $this->getData('prices');
            $plan = $this->getPlanByCode($prices, $request);

            $codigo = $request->codigo;
            $chosen_plan = $this->getData('plans');

            foreach ($chosen_plan as $key => $value) {
                if ($value['codigo'] == $codigo) {
                    $chosen_plan = $value['nome'];
                    break;
                }
            }

            $data = $request->input();

            $precoTotal = 0;
            for ($i = 0; $i < count($data['dadosBenefs']); $i++) {
                $range = $this->range($data['dadosBenefs'][$i]['idade']);
                $price = $plan[0][$range];
                $data['dadosBenefs'][$i]['preco'] = $price;
                $precoTotal += $price;
            }

            $data['precoTotal'] = $precoTotal;
            $data['plano'] = $chosen_plan;
            $this->writeJsonFile($data, 'proposta');
            return $plan;
        } catch (\Throwable $th) {
            return response()
                ->json(["errors" => [$th->getMessage()], "line" => [$th->getLine()]], 500);
        }
    }

    public function listAllPlans($name_file)
    {
        try {
            return [$this->getData($name_file)];
        } catch (\Throwable $th) {
            return response()
                ->json(["errors" => [$th->getMessage()]], $th->getCode());
        }
    }
}
