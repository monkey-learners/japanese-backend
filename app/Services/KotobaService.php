<?php

namespace App\Services;

use App\Models\Kotoba;
use App\Repositories\KotobaRepository;
use Illuminate\Support\Collection;

class KotobaService
{
    private $kotobaRepo;

    public function __construct(KotobaRepository $kotobaRepo)
    {
        $this->kotobaRepo = $kotobaRepo;
    }

    public function getAll(): Collection
    {
        return $this->kotobaRepo->getAll();
    }

    public function getById($id): ?Kotoba
    {
        return $this->kotobaRepo->getById($id);
    }

    public function store(array $data): Kotoba
    {
        return $this->kotobaRepo->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->kotobaRepo->update($id, $data);
    }

    public function destroy(int $id): bool
    {
        return $this->kotobaRepo->destroy($id);
    }
}