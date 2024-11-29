<?php

namespace Database\Seeders;

use App\Models\Regiao;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegiaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Copilot Harded Code
        // $regioes = [
        //     'Norte',
        //     'Nordeste',
        //     'Centro-Oeste',
        //     'Sudeste',
        //     'Sul',
        // ];

        // foreach ($regioes as $regiao) {
        //     Regiao::create(['nome' => $regiao]);
        // }

        try {
            if (Regiao::all()->count()) {
                Log::channel('stderr')->info("O banco já possui regioes!");
                print_r(Regiao::all()->pluck('nome','id'));
                return;
            }

            $jsonUrl = 'https://raw.githubusercontent.com/chandez/Estados-Cidades-IBGE/master/json/regioes.json';
            $response = Http::get($jsonUrl);
            $regioes = $response->json()['data'];

            if (!$regioes)
                throw new \Exception("Erro ao carregar arquivo JSON de Regioes!\nURL:$jsonUrl");

            $listRegioes = [];
            foreach ($regioes as $regiao)
                $listRegioes[] = ["nome" => $regiao['Nome']];

            // print_r($listRegioes);
            // die;

            if (!Regiao::insert($listRegioes))
                throw new \Exception("Erro ao inserir Regioes!", 1);

            Log::channel('stderr')->info("Regiões inseridas com sucesso!");
            print_r(Regiao::all()->pluck('nome','id'));
        } catch (Exception $error) {
            throw new Exception("Erro ao processar o seed de Regioes!\n {$error->getMessage()}");
        }
    }
}
