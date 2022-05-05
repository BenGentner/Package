<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class Media extends \Webfactor\WfBasicFunctionPackage\Nova\Media
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
//    public static $model = parent::$model;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
//    public static $title = parent::$title;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
//    public static $search = parent::$search;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return
            array_merge(parent::fields($request),
                [
//                      new fields
                ],
            );
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return
            array_merge(parent::cards($request),
                [
//                      new cards
                ],
            );
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return
            array_merge(parent::filters($request),
                [
//                      new filters
                ],
            );
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return
            array_merge(parent::lenses($request),
                [
//                      new lenses
                ],
            );
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return
            array_merge(parent::actions($request),
                [
//                      new actions
                ],
            );
    }
}
