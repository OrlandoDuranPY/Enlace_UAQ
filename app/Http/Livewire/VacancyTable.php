<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Vacancy;

class VacancyTable extends DataTableComponent
{
    protected $model = Vacancy::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Company", "company")
                ->sortable(),
            Column::make("Location", "location")
                ->sortable(),
            Column::make("Job title", "job_title")
                ->sortable(),
            Column::make("Salary", "salary")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Observations", "observations")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
