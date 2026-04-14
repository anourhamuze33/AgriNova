<?php

namespace App\Services;

use App\Models\Culture;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StockService
{
    public function getDashboardData(): array
    {
        $now = Carbon::now();

        $lots = Culture::with(['typeCulture', 'field', 'user'])
            ->orderBy('harvest_date')
            ->paginate(8);

        $lots->setCollection(
            $lots->getCollection()->map(function (Culture $culture) use ($now) {
                return $this->mapLot($culture, $now);
            })
        );

        return [
            'stats' => $this->buildStats($now),
            'alerts' => $this->buildAlerts($now),
            'lots' => $lots,
            'today' => $now,
        ];
    }

    private function buildStats(Carbon $now): array
    {
        $inStock = Culture::where('cycle', 'done')->count();
        $toHarvest = Culture::whereIn('cycle', ['harvest', 'growth'])->count();
        $late = Culture::whereDate('harvest_date', '<', $now)->where('cycle', '!=', 'done')->count();
        $active_fields = Culture::distinct('field_id')->count('field_id');
        return [
            'total_lots' => Culture::count(),
            'in_stock' => $inStock,
            'to_harvest' => $toHarvest,
            'late' => $late,
            'active_fields' => $active_fields,
        ];
    }

    private function buildAlerts(Carbon $now): array
    {
        return Culture::with(['typeCulture', 'field'])
            ->orderBy('harvest_date')
            ->get()
            ->map(function (Culture $culture) use ($now) {
                $days = floor($now->diffInDays($culture->harvest_date, false));
                $name = $culture->typeCulture->name;
                $field = $culture->field->name;

                if ($culture->cycle !== 'done' && $days < 0) {
                    return [
                        'type' => 'late',
                        'title' => "Lot en retard - {$name}",
                        'description' => "Date prevue depassee de " . abs($days) . " jours - {$field}",
                    ];
                }

                if ($culture->cycle !== 'done' && $days <= 7) {
                    return [
                        'type' => 'warn',
                        'title' => "Lot a traiter bientot - {$name}",
                        'description' => "Recolte prevue dans {$days} jours - {$field}",
                    ];
                }

                if ($culture->cycle === 'done') {
                    return [
                        'type' => 'good',
                        'title' => "Lot en stock - {$name}",
                        'description' => "Lot recolte et disponible en stock - {$field}",
                    ];
                }

                return null;
            })
            ->filter()
            ->values()
            ->all();
    }

    private function mapLot(Culture $culture, Carbon $now): array
    {
        $days = floor($now->diffInDays($culture->harvest_date));
        $status = $this->computeStatus($culture->cycle, $days);

        return [
            'id' => $culture->id,
            'culture_name' => $culture->typeCulture->name,
            'culture_type' => $culture->typeCulture->type,
            'field_name' => $culture->field->name,
            'harvest_date' => $culture->harvest_date,
            'cycle' => $culture->cycle,
            'manager' => $culture->user->name ?? $culture->user->name,
            'status_label' => $status['label'],
            'status_class' => $status['class'],
            'date_badge' => $status['date_badge'],
            'date_badge_class' => $status['date_badge_class'],
            'days_to_harvest' => $days,
            'image' => $culture->typeCulture->imgUrl
                ? asset('storage/Cultures/' . $culture->typeCulture->imgUrl)
                : asset('assets/unknowing.png'),
        ];
    }

    private function computeStatus(string $cycle, int $days): array
    {
        if ($cycle === 'done') {
            return [
                'label' => 'En stock',
                'class' => 's-d',
                'date_badge' => 'Lot stocke',
                'date_badge_class' => 'dt-o',
            ];
        }

        if ($days < 0) {
            return [
                'label' => 'En retard',
                'class' => 's-l',
                'date_badge' => 'Retard',
                'date_badge_class' => 'dt-l',
            ];
        }

        if ($days <= 7) {
            return [
                'label' => 'A traiter',
                'class' => 's-s',
                'date_badge' => 'Bientot',
                'date_badge_class' => 'dt-s',
            ];
        }

        if ($cycle === 'harvest') {
            return [
                'label' => 'Pret recolte',
                'class' => 's-p',
                'date_badge' => 'En cours',
                'date_badge_class' => 'dt-o',
            ];
        }

        return [
            'label' => 'Planifie',
            'class' => 's-pl',
            'date_badge' => 'A venir',
            'date_badge_class' => 'dt-f',
        ];
    }
}
