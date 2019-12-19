<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_create()
    {
        $faker = \Faker\Factory::create();
        $seed = InitSeed::getInstance()->getSeed();
        $admin = $seed->seed_admin();

        $data = [
           'admin_id' => $admin->id,
           'name' => $faker->unique()->sentence($nbWords = 2, $variableNbWords = true),
           'description' => $faker->text($maxNbChars = 50),
           'status' => 1
        ];

        $response = $this->json('POST', '/api/v1/category', $data);
        $response->assertStatus(201);

        $this->assertDatabaseHas('categories', $data);

        $category = Category::all()->first();

        $response->assertJson([
            'data' => [
                'category' => [
                    'name' => $category->name
                ]
            ]
        ]);
    }

    public function test_category_max_field_create()
    {
        $faker = \Faker\Factory::create();
        $seed = InitSeed::getInstance()->getSeed();
        $admin = $seed->seed_admin();

        $data = [
            'admin_id' => $admin->id,
            'name' => $faker->text($maxNbChars = 200),
            'description' => $faker->text($maxNbChars = 200),
            'status' => 1
        ];

        $response = $this->json('POST', '/api/v1/category', $data);
        $response->assertStatus(422);
    }

    public function test_category_min_field_create()
    {
        $seed = InitSeed::getInstance()->getSeed();
        $admin = $seed->seed_admin();

        $data = [
            'admin_id' => $admin->id,
            'name' => 'a',
            'description' => 's',
            'status' => 1
        ];

        $response = $this->json('POST', '/api/v1/category', $data);
        $response->assertStatus(422);
    }

    public function test_category_empty_create()
    {
        $data = [];

        $response = $this->json('POST', '/api/v1/category', $data);
        $response->assertStatus(422);
    }

    public function test_category_update()
    {
        $faker = \Faker\Factory::create();

        $update = [
           'name' => $faker->unique()->sentence($nbWords = 2, $variableNbWords = true),
           'description' => $faker->text($maxNbChars = 50),
           'status' => 1
        ];

        $seed = InitSeed::getInstance()->getSeed();
        $category = $seed->seed_category();

        $response = $this->json('PUT', "/api/v1/category/{$category['category_id']}", $update);
        $response->assertStatus(200);

        $cate = Category::all()->first();
        
        $this->assertEquals($cate->name, $update['name']);
    }

    public function test_category_delete()
    {
        $seed = InitSeed::getInstance()->getSeed();
        $category = $seed->seed_category();

        $this->json('DELETE', "/api/v1/category/{$category['category_id']}")->assertStatus(204);
        $this->assertNull(Category::find($category['category_id']));
    }
}
