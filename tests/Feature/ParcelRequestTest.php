<?php

namespace Tests\Feature;

use App\Parcel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParcelRequestTest extends TestCase
{

    use RefreshDatabase;

    public function test_it_stores_new_parcel()
    {
        $data = factory(Parcel::class)->make();

        $response = $this->postJson(route('parcel.store'), $data->toArray());

        $response->assertStatus(302);
        $this->assertDatabaseHas('parcels', [
            'title' => $data['title'],
            'from' => $data['from'],
            'to' => $data['to'],
            'km_domestic' => $data['km_domestic'],
            'km_international' => $data['km_international'],
        ]);
    }

    public function test_it_updates_parcel()
    {
        $data = factory(Parcel::class)->make();
        $id = $this->createParcelAndRetrieveId($data->toArray());

        $data['title'] = 'new title';
        $response = $this->putJson(route('parcel.update', $id), $data->toArray());

        $response->assertStatus(302);
        $this->assertDatabaseHas('parcels', [
            'id' => $id,
            'title' => 'new title',
        ]);
    }

    public function test_it_can_delete_parcel()
    {
        $data = factory(Parcel::class)->make();
        $id = $this->createParcelAndRetrieveId($data->toArray());

        $response = $this->deleteJson(route('parcel.destroy', $id));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('parcels', [
            'id' => $id,
        ]);
    }

    private function createParcelAndRetrieveId($data)
    {
        $response = $this->postJson(route('parcel.store'), $data);

        return $this->getIdFromLocationHeader($response->headers->get("Location"));
    }

    /**
     * @param $url
     * @return int
     */
    protected function getIdFromLocationHeader($url)
    {
        $arr = explode('/', $url);
        return (int)$arr[count($arr) - 2];
    }
}
