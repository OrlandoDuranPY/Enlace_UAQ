<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Activity;

class ActivityTable extends DataTableComponent
{
    protected $model = Activity::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Acción", "name")
                ->sortable()
                ->searchable(),
            Column::make("Responsable", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("ID Curriculum", "curricula_id")
                ->sortable()
                ->searchable(),
            Column::make("ID Vacante", "vacancies_id")
                ->sortable()
                ->searchable(),
            Column::make("Creado", "created_at")
                ->sortable()
                ->searchable(),
            Column::make("Actualizado", "updated_at")
                ->sortable()
                ->searchable(),
        ];
    }
}
