<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UFExport;

class UFValuesController extends Controller
{
    
    public function index(Request $request)
    {
        session()->flush();
        if ($request->input('month') && $request->input('format')) {
            try {
                $request->flash();
                $urlAPI = 'https://api.sbif.cl/api-sbifv3/recursos_api/uf/2019/{mes}?apikey=d8093171162117c0c6e8da895b00978d4e2b6a0e&formato=json';
                $urlReq = str_replace('{mes}', $request->input('month'), $urlAPI);
                $client = new Client();
                $response = $client->request('GET', $urlReq);
                $data = json_decode((string)$response->getBody());
                $data_ufs = [];
                
                if ($response->getStatusCode() == 200){
                    $data_ufs = $data->UFs;
                    session()->flash('success', 'Datos encontrados.');
                    if ($request->input('format') === 'excel') {
                        return Excel::download(new UFExport($data_ufs), 'ufs.xlsx');
                    }
                    return view('uf.index', ['data' => $data_ufs]);
                }
            } catch (\Throwable $th) {
                session()->flash('error', 'No hemos podido encontrar datos con los parámetros ingresados');
                return view('uf.index');
            }
        }
        return view('uf.index');
    }
}
