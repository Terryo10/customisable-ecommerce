<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Sight;

class SlidersResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Sliders::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            \Orchid\Screen\Fields\Input::make('title')
                ->title('Title')
                ->required(),

            \Orchid\Screen\Fields\Quill::make('description')
                ->title('Description')
                ->rows(5)
                ->required(),

            \Orchid\Screen\Fields\Picture::make('image')
                ->title('Picture')
                ->placeholder('Upload a picture')
                ->acceptedFiles('image/*')
                ->storage('public')
                ->maxFiles(1)
                ->required(),

            // \Orchid\Screen\Fields\Group::make([
            //     Button::make('Create Slide')
            //         ->method('save')
            //         ->icon('check'),
            // ]),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('image')->render(function ($model) {
                return '<img src="' . $model->image . '" alt="Picture" width="50px" />';
            }),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('title'),
            Sight::make('description'),
            Sight::make('image'),
            Sight::make('created_at'),
            Sight::make('updated_at'),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
