<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileJson
{
    public function getData($name_file)
    {
        if ($this->verifyIfFileExists($name_file))
            return json_decode(Storage::disk('public')
                ->get("{$name_file}.json"), true);
        return response()
            ->json(['msg' => 'Arquivo não encontrado'], 404);
    }

    public function verifyIfFileExists($name_file)
    {
        if (Storage::disk('public')->exists("{$name_file}.json"))
            return true;
        return false;
    }

    public function writeJsonFile($data, $name_file)
    {
        Storage::disk('public')
            ->put("{$name_file}.json", json_encode($data));
    }

    public function getPlanByCode($prices, $request)
    {
        $plans = [];
        foreach ($prices as $key => $value) {
            if ($value['codigo'] == $request->codigo) {
                array_push($plans, $value);
            }
        }

        if (count($plans) == 1) {
            $plan = $plans;
        } elseif (count($plans) > 1) {
            for ($i = 0; $i <= count($plans); $i++) {
                if (
                    $request->minimo_vidas >= $plans[$i]['minimo_vidas']
                    && $request->minimo_vidas < $plans[$i + 1]['minimo_vidas']
                ) {
                    $plan = [$plans[$i]];
                    break;
                }
                    $plan = [$plans[$i + 1]];
                    break;
            }
        } else {
            return response()
                ->json(['msg' => 'Plano não encontrado'], 404);
        }
        return $plan;
    }

    public function range($range)
    {
        switch ($range) {
            case $range >= 0 && $range <= 17:
                return 'faixa1';
                break;
            case $range >= 18 && $range <= 40:
                return 'faixa2';
                break;
            case $range >= 40:
                return 'faixa3';
                break;
            default:
                return false;
                break;
        }
    }

    // public function joinInformation(){
        
    // }
}
