<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Curriculum;

class CurriculumTable extends DataTableComponent
{
    protected $model = Curriculum::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Last name", "last_name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Phone", "phone")
                ->sortable(),
            Column::make("About me", "about_me")
                ->sortable(),
            Column::make("Academic achievements", "academic_achievements")
                ->sortable(),
            Column::make("Experience", "experience")
                ->sortable(),
            Column::make("Projects", "projects")
                ->sortable(),
            Column::make("References", "references")
                ->sortable(),
            Column::make("Study programs id", "study_programs_id")
                ->sortable(),
            Column::make("Semester", "semester")
                ->sortable(),
            Column::make("Academic programs id", "academic_programs_id")
                ->sortable(),
            Column::make("Study level", "study_level")
                ->sortable(),
            Column::make("Degree", "degree")
                ->sortable(),
            Column::make("Type", "type")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
