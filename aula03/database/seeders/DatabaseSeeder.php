<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.test.dev',
            'password' => env('APP_ADMIN_PASSWORD','admin123'),
        ]);

        $this->call([
            RegiaoSeeder::class,
            EstadoSeeder::class,
        ]);

        Fornecedor::factory(50)
                ->hasProdutos(100)
                ->create();

        $this->call([
                PromocaoSeeder::class,
                ProdutoPromocaoSeeder::class,
            ]);
    }
}
