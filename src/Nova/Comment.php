<?php

namespace Webfactor\WfBasicFunctionPackage\Nova;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Webfactor\WfBasicFunctionPackage\Nova\Filters\UserFilter;

class Comment extends Resource
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
    public static $title = 'id';

    /**
     * The group that the resource should be added to
     *
     * @var string
     */
    public static $group = 'Post';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'user_id',
    ];

    public static $globallySearchable = false;

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make("user")->exceptOnForms(),
            BelongsTo::make("post")->searchable(),
            TextArea::make("body")->displayUsing(function ($id) {
                $preview = strip_tags(substr($id, 0, 30));
                return $preview . "...";
            })->onlyOnIndex(),
            Trix::make("body")->rules("max:65535")->hideFromIndex(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [
            new UserFilter(),
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
