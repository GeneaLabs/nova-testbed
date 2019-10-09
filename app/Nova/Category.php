<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Category extends Resource
{
    public static $displayInNavigation = false;
    public static $model = 'App\Category';
    public static $title = 'name';
    public static $search = [
        "id",
        "name",
        "description",
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()
                ->hideFromDetail()
                ->sortable(),
            Text::make("Title")
                ->sortable()
                ->rules('required', 'max:255'),
            Textarea::make("Description"),
            DateTime::make("Created", "created_at")
                ->onlyOnDetail(),
            DateTime::make("Last Updated", "updated_at")
                ->onlyOnDetail(),
        ];
    }
}
