<?php

namespace App\Livewire\PowerGridDemo;

use App\Helpers\PowerGridThemes\TailwindStriped;

final class StripedTable extends SimpleTable
{
    public function template(): ?string
    {
        return TailwindStriped::class;
    }
}
