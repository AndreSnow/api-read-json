<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;
use App\Traits\FileJson;

class ReadFilesController extends Controller
{
    use FileJson;

    public function getFile($name_file)
    {
        return $this->getData($name_file); 
    }

    public function SimulateBeneficiaries(ValidateRequest $request)
    {
        $response = $this->getResponseSimulation($request);
        return response()
            ->json($response, 200);
    }

    public function SimulateProposals(ValidateRequest $request)
    {
        $response = $this->getResponseSimulation($request);
        return response()
            ->json($response, 200);
    }
}
