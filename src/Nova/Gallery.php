<?php

namespace Webfactor\WfBasicFunctionPackage\Nova;

use App\Nova\Resource;
use App\Nova\User;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;


class Gallery extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = '';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The group that the resource should be added to
     *
     * @var string
     */
    public static $group = 'Gallery';
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'user_id',
        'title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make("Title", "title")->rules("max:255"),
            Text::make("Slug", "slug")
                ->rules("max:255")
                ->creationRules("unique:galleries,slug")
                ->updateRules('unique:galleries,slug,{{resourceId}}'),
            Textarea::make("Description", "description")->rules("max:65535", "nullable"),
            BelongsTo::make("user")->exceptOnForms(),
            BelongsTo::make("creator", "creator", User::class)->exceptOnForms(),
            Images::make('Header Image', 'header'),
            Images::make('Images', 'images'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new \Webfactor\WfBasicFunctionPackage\Nova\Filters\UserFilter(),
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
