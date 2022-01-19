<?php

namespace App\Repositories;

use App\Models\Kotoba;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class KotobaRepository
{
    private $kotobaModel;

    function __construct(Kotoba $kotobaModel) {
        $this->kotobaModel = $kotobaModel;
    }

    public function getAll(): Collection
    {
        return $this->kotobaModel::all();
    }

    public function getById(int $id): ?Kotoba
    {
        return $this->kotobaModel::find($id);
    }

    public function create(array $data): Kotoba
    {
        return $this->kotobaModel::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $kotoba = $this->getById($id);
        $kotoba->fill($data);

        return $kotoba->save();
    }

    public function destroy(int $id): bool
    {
        return $this->kotobaModel::destroy($id);
    }
}