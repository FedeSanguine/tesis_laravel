<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AbmArticulosTest extends TestCase
{

    use RefreshDatabase;

    protected bool $seed = true;

    public function asUser(): self
    {
        $user = new User();
        $user->user_id = 1;
        $user->rol = 'administrador';
        return $this->actingAs($user);
    }

    /*
     * A basic feature test example.
     */
    public function test_de_solicitud_a_la_api_devuelve_todos_los_productos(): void

    
    {
        $response = $this->asUser()->getJson('/api/articulos');
        $response
            ->assertStatus(200)
            ->assertJsonPath('status', 0)
            ->assertJsonCount(6, 'data')
            ->assertJsonStructure([
                'status',
                'data' => [
                    '*' => [
                        'articulos_id',
                        'generos_id',
                        'consolas_id',
                        'nombre',
                        'formato',
                        'precio',
                        'descripcion',
                        'imagen',
                        'descripcion_imagen',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);
    }


    public function test_de_solicitud_a_la_api_devuelve_401_si_no_estas_autenticado()
    {
        $response = $this->getJson('/api/articulos');

        $response->assertStatus(401);
    }

    public function test_de_solicitud_a_la_api_devuelve_producto_solicitado_si_estas_autenticado()
    {
        $id = 1;
        $response = $this->asUser()->getJson('/api/articulos/' . $id);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.articulos_id', $id)
                    ->whereAllType([
                        'status' => 'integer',
                        'data.articulos_id' => 'integer',
                        'data.generos_id' => 'integer',
                        'data.consolas_id' => 'integer',
                        'data.nombre' => 'string',
                        'data.formato' => 'string',
                        'data.precio' => 'integer|double',
                        'data.descripcion' => 'string',
                        'data.imagen' => 'string|null',
                        'data.descripcion_imagen' => 'string|null',
                        'data.created_at' => 'string',
                        'data.updated_at' => 'string',
                    ])
            );
    }

    public function test_de_solicitud_a_la_api_devuelve_404_con_id_inexistente()
    {
        $response = $this->asUser()->getJson('/api/articulos/7');

        $response->assertStatus(404);
    }

    public function test_publicar_articulo_nuevo_con_datos_validos_retorna_un_articulo_nuevo()
    {
        $data = [
            'generos_id' => 2,
            'consolas_id' => 1,
            'nombre' => 'Fifa 23',
            'title' => 'Fifa 23',
            'formato' => 'Digital',
            'precio' => 1999.99,
            'price' => 1999.99,
            'descripcion' => 'Juegos de futbol Fifa 23',
        ];
        $response = $this->asUser()->postJson('/api/articulos', $data);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('status', 0),
            );

        $response = $this->asUser()->getJson('/api/articulos/7');

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.generos_id', $data['generos_id'])
                    ->where('data.consolas_id', $data['consolas_id'])
                    ->where('data.nombre', $data['nombre'])
                    ->where('data.formato', $data['formato'])
                    ->where('data.precio', $data['precio'])
                    ->where('data.imagen', null)
                    ->where('data.descripcion_imagen', null)
                    ->etc()
            );
    }

    public function test_de_solicitud_a_la_api_para_actualizar_producto()
    {
        $data = [
            'generos_id' => 2,
            'consolas_id' => 1,
            'nombre' => 'Fifa 23',
            'formato' => 'Digital',
            'precio' => 1999.99,
            'descripcion' => 'Juegos de futbol Fifa 23',
        ];

        $response = $this->asUser()->postJson('/api/articulos', $data);

        $idUpdate = $response->json('data.articulos_id');

        $updatedData = [
            'generos_id' => 3,
            'consolas_id' => 2,
            'nombre' => 'Fifa 24',
            'formato' => 'Físico',
            'descripcion' => 'Juegos de futbol Fifa 24',
        ];

        $response = $this->asUser()->putJson("/api/articulos/{$idUpdate}", $updatedData);

        $response->assertStatus(200)
            ->assertJson(['status' => 0]);

        $getProductoResponse = $this->asUser()->getJson("/api/articulos/{$idUpdate}");

        $getProductoResponse->assertStatus(200)
            ->assertJson([
                'status' => 0,
                'data' => $updatedData
            ]);
    }

    public function test_de_solicitud_a_la_api_para_eliminar_producto()
    {
        $data = [
            'generos_id' => 2,
            'consolas_id' => 1,
            'nombre' => 'Fifa 23',
            'title' => 'Fifa 23',
            'formato' => 'Digital',
            'precio' => 1999.99,
            'price' => 1999.99,
            'descripcion' => 'Juegos de futbol Fifa 23',
        ];

        $response = $this->asUser()->postJson('/api/articulos', $data);

        $idDelete = $response->json('data.articulos_id'); 

        $deleteResponse = $this->asUser()->deleteJson("/api/articulos/{$idDelete}");

        $deleteResponse->assertStatus(200)
            ->assertJson(['status' => 0]);
    
    
    }

}
