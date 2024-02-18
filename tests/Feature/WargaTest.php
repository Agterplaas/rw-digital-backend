<?php

use App\Models\Warga;
use Illuminate\Foundation\Testing\WithFaker;

uses(WithFaker::class);

it('can get a list of Warga', function () {
    $response = $this->get('/api/warga');

    $response->assertStatus(200);
});

it('can create a Warga', function () {
    $data = [
        'no_kk' => $this->faker->text(255),
        'nik' => $this->faker->text(255),
        'nama' => $this->faker->text(255),
        'jenis_kelamin' => $this->faker->numberBetween(1, 10),
        'tgl_lahir' => $this->faker->date(),
        'alamat_ktp' => $this->faker->text(255),
        'blok' => $this->faker->text(20),
        'nomor' => $this->faker->numberBetween(1, 10),
        'rt' => $this->faker->numberBetween(1, 10),
        'agama' => $this->faker->randomElement([0, 1]),
        'status_pekerjaan' => $this->faker->numberBetween(0, 7),
        'pekerjaan' => $this->faker->text(255),
        'no_telp' => $this->faker->text(30),
        'status_warga' => $this->faker->text(255),
        'status_kawin' => $this->faker->numberBetween(1, 10),
        'status_sosial' => $this->faker->text(255),
        'catatan' => $this->faker->text(255),
        'kk_pj' => $this->faker->numberBetween(1, 10),
        'created_by' => $this->faker->text(50),
        'updated_by' => $this->faker->text(50),
    ];

    $this->postJson('/api/warga', $data)->assertStatus(201);
});

it('can fetch a Warga', function () {
    $warga = Warga::factory()->create();

    $this->getJson('/api/warga/' . $warga->id)->assertStatus(200);
});

it('can update a Warga', function () {
    $warga = Warga::factory()->create();

    $data = [
        'no_kk' => $this->faker->text(255),
        'nik' => $this->faker->text(255),
        'nama' => $this->faker->text(255),
        'jenis_kelamin' => $this->faker->numberBetween(1, 10),
        'tgl_lahir' => $this->faker->date(),
        'alamat_ktp' => $this->faker->text(255),
        'blok' => $this->faker->text(20),
        'nomor' => $this->faker->numberBetween(1, 10),
        'rt' => $this->faker->numberBetween(1, 10),
        'agama' => $this->faker->randomElement([0, 1]),
        'pekerjaan' => $this->faker->text(255),
        'no_telp' => $this->faker->text(30),
        'status_warga' => $this->faker->text(255),
        'status_kawin' => $this->faker->numberBetween(1, 10),
        'status_sosial' => $this->faker->text(255),
        'catatan' => $this->faker->text(255),
        'kk_pj' => $this->faker->numberBetween(1, 10),
        'created_by' => $this->faker->text(50),
        'updated_by' => $this->faker->text(50),
    ];

    $this->putJson('/api/warga/'.$warga->id, $data)->assertStatus(200);
});

it('can delete a Warga', function () {
    $warga = Warga::factory()->create();

    $this->deleteJson('/api/warga/'.$warga->id)->assertStatus(204);
    $this->assertSoftDeleted('warga', ['id' => $warga->id]);
});
