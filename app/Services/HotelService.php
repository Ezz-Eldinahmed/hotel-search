<?php

namespace App\Services;

use App\Models\Hotel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class HotelService
{
    public function search(array $filters): Collection
    {
        $suppliers = ['supplier_a', 'supplier_b', 'supplier_c', 'supplier_d'];

        $results = collect();

        foreach ($suppliers as $supplier) {
            try {
                $results = $results->merge(
                    Hotel::where('source', $supplier)
                        ->when($filters['location'] ?? null, fn($q, $value) =>
                        $q->where('location', 'LIKE', "%{$value}%"))
                        ->when($filters['min_price'] ?? null, fn($q, $value) =>
                        $q->where('price_per_night', '>=', $value))
                        ->when($filters['max_price'] ?? null, fn($q, $value) =>
                        $q->where('price_per_night', '<=', $value))
                        ->when($filters['guests'] ?? null, fn($q, $value) =>
                        $q->where('available_rooms', '>=', $value))
                        ->get()
                );
            } catch (\Throwable $e) {
                Log::warning("Failed to fetch from {$supplier}: {$e->getMessage()}");
            }
        }

        $merged = $results
            ->groupBy(fn($hotel) => strtolower($hotel->name) . '|' . strtolower($hotel->location))
            ->map(fn($group) => $group->sortBy('price_per_night')->first())
            ->values();

        return !empty($filters['sort_by'])
            ? $merged->sortBy($filters['sort_by'])->values()
            : $merged;
    }
}
