<?php

namespace Webfactor\WfBasicFunctionPackage\Nova;

use App\Nova\Resource;
use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\MediaLibrary\HasMedia;
use ZiffMedia\NovaSelectPlus\FieldServiceProvider;
use ZiffMedia\NovaSelectPlus\SelectPlus;

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
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
            Text::make("title", "title"),
            Text::make("slug", "slug"),
            Textarea::make("description", "description"),
            BelongsTo::make("user"),
            BelongsTo::make("Header", "header_image", Media::class),
//            SelectPlus::make('media', 'media', Media::class)->label('title'),
            Images::make('Multiple files', 'multiple_files'),
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
        return [];
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
