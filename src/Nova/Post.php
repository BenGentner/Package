<?php /** @noinspection PhpDocSignatureInspection */

namespace Webfactor\WfBasicFunctionPackage\Nova;

use App\Nova\Resource;
use App\Nova\User;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use ZiffMedia\NovaSelectPlus\SelectPlus;

class Post extends Resource
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
    public static $group = 'Post';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
        'user_id',
        'excerpt'
    ];

    public  function subtitle()
    {
        return "Author: {$this->user->name}";
    }

//    public static function indexQuery(NovaRequest $request, $query)
//    {
//        return $query->where('user_id', $request->user()->id);
//    }


    /**
     * Get the fields displayed by the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        $tags = \Webfactor\WfBasicFunctionPackage\Models\Tag::all()->pluck('name', 'id');
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make("Title", "title")->rules("max:255"),
            Text::make("Slug", "slug")->rules("max:255")->hideFromIndex()
                ->creationRules("unique:posts,slug")
                ->updateRules('unique:posts,slug,{{resourceId}}'),
            BelongsTo::make("Category", "category"),
            BelongsTo::make("User", "user")->exceptOnForms(),
            BelongsTo::make("Creator", "creator", User::class)->exceptOnForms(),
            Text::make("Excerpt", "excerpt")
                ->displayUsing(function ($excerpt) {
                    $preview = strip_tags(substr($excerpt, 0, 30));
                    $preview = $preview . "...";
                    return $preview;
                })->onlyOnIndex(),
            Textarea::make("Excerpt", "excerpt")->rules("max:65535", "required")
                ->displayUsing(function ($excerpt){
                    return strip_tags($excerpt);
                })
                ->hideFromIndex(),
            Trix::make("Body", "body")->rules("max:65535", "required")
                ->displayUsing(function ($body) {
                    return strip_tags($body);
                }),
            Boolean::make("commentable")->default(true),
            MultiSelect::make("Tags", "tags")
                ->options($tags)
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
            new \Webfactor\WfBasicFunctionPackage\Nova\Filters\Category(),
            new \Webfactor\WfBasicFunctionPackage\Nova\Filters\UserFilter(),
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
     * @param NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
