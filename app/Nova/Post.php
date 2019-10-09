<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Post extends Resource
{
    public static $model = "App\Post";
    public static $title = "id";
    public static $search = [
        "id",
        "title",
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()
                ->sortable(),
            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),
            BelongsTo::make("Category")
                ->nullable()
                ->searchable()
                ->hideFromIndex(),
            Textarea::make("Body"),
            DateTime::make("Created", "created_at")
                ->onlyOnDetail(),
            DateTime::make("Last Updated", "updated_at")
                ->onlyOnDetail(),
        ];
    }
}
