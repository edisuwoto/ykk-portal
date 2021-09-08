<x-livewire-tables::layouts.table>
    <x-slot name="head">
        @if (count($bulkActions))
            <x-livewire-tables::layouts.table.heading class="w-12">
                <x-checkbox wire:model="selectPage" />
            </x-livewire-tables::layouts.table.heading>
        @endif

        @foreach($columns as $column)
            @if ($column->isVisible())
                @if ($column->isBlank())
                    <x-livewire-tables::layouts.table.heading />
                @else
                    <x-livewire-tables::layouts.table.heading
                        :sortable="$column->isSortable()"
                        :column="$column->column()"
                        :direction="$column->column() ? $sorts[$column->column()] ?? null : null"
                        :text="$column->text() ?? ''"
                        :class="$column->class() ?? ''"
                    />
                @endif
            @endif
        @endforeach
    </x-slot>

    <x-slot name="body">
        @include('livewire-tables::layouts.includes.bulk-select-row')

        @forelse ($rows as $index => $row)
            <x-livewire-tables::layouts.table.row
                wire:loading.class.delay="opacity-50"
                wire:key="table-row-{{ $row->getKey() }}"
                :url="method_exists($this, 'getTableRowUrl') ? $this->getTableRowUrl($row) : ''"
                :class="
                    ($index % 2 === 0 ? 'bg-white' . (method_exists($this, 'getTableRowUrl') ? ' hover:bg-gray-100' : '') : 'bg-gray-50') .
                    (method_exists($this, 'getTableRowUrl') ? ' hover:bg-gray-100' : '') .
                    (method_exists($this, 'setTableRowClass') ? ' ' . $this->setTableRowClass($row) : '')
                "
                :id="method_exists($this, 'setTableRowId') ? $this->setTableRowId($row) : ''"
                :customAttributes="method_exists($this, 'setTableRowAttributes') ? $this->setTableRowAttributes($row) : []"
            >
                @if (count($bulkActions))
                    <x-livewire-tables::layouts.table.cell class="text-center">
                        <x-checkbox
                            wire:model="selectPage"
                            wire:model="selected"
                            wire:loading.attr.delay="disabled"
                            value="{{ $row->{$primaryKey} }}"
                            onclick="event.stopPropagation();return true;"
                        />
                    </x-livewire-tables::layouts.table.cell>
                @endif

                @include($rowView)
            </x-livewire-tables::layouts.table.row>
        @empty
            <x-livewire-tables::layouts.table.row>
                <x-livewire-tables::layouts.table.cell :colspan="count($bulkActions) ? count($columns) + 1 : count($columns)">
                    <div class="flex justify-center items-center space-x-2 text-center">
                        <span class="font-medium py-2 text-sm">@lang($emptyMessage)</span>
                    </div>
                </x-livewire-tables::layouts.table.cell>
            </x-livewire-tables::layouts.table.row>
        @endforelse
    </x-slot>

    <x-slot name="foot">
        @foreach($columns as $column)
            @if ($column->isVisible())
                @if ($column->isBlank())
                    <x-livewire-tables::layouts.table.heading />
                @else
                    <x-livewire-tables::layouts.table.heading
                        :sortable="$column->isSortable()"
                        :column="$column->column()"
                        :direction="$column->column() ? $sorts[$column->column()] ?? null : null"
                        :text="$column->text() ?? ''"
                        :class="$column->class() ?? ''"
                    />
                @endif
            @endif
        @endforeach
    </x-slot>
</x-livewire-tables::layouts.table>
