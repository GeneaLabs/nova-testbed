<?php namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class OwnFilter extends Filter
{
    public $name = "Records";
    public $component = 'boolean-filter';

    public function apply(Request $request, $query, $value)
    {
        if (! $value
            || ! array_key_exists("show-only-own-records", $value)
            || ! $value["show-only-own-records"]
        ) {
            return $query;
        }

        return $query->where("id", auth()->user()->id);
    }

    public function default()
    {
        return ["show-only-own-records" => true];
    }

    public function options(Request $request)
    {
        return [
            "Only Mine" => "show-only-own-records",
        ];
    }
}
