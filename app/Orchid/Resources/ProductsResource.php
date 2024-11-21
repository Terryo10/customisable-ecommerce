<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\TD;

class ProductsResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Products::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function screen(): array
    {
        return [
            // Include the form fields
            Layout::rows($this->fields()),

            // Include your custom JavaScript
            Layout::view('layouts.script'),
        ];
    }

    public function fields(): array
    {
        return [
            \Orchid\Screen\Fields\Input::make('name')
                ->title('Title')
                ->required(),

            \Orchid\Screen\Fields\Input::make('quantity')
                ->title('Quantity')
                ->type('number')
                ->required(),

            \Orchid\Screen\Fields\Quill::make('location')
                ->title('Description')
                ->rows(2),
            \Orchid\Screen\Fields\Quill::make('short_description')
                ->title('Short Description')
                ->rows(2)
                ->required(),

            \Orchid\Screen\Fields\Quill::make('description')
                ->title('Description')
                ->rows(5)
                ->required(),

            \Orchid\Screen\Fields\Picture::make('feature_image')
                ->title('Picture')
                ->placeholder('Upload a picture')
                ->acceptedFiles('image/*')
                ->storage('public')
                ->maxFiles(1),
                // ->required(),

            \Orchid\Screen\Fields\Upload::make('images')
                ->acceptedFiles('image/*')
                ->storage('public')
                ->maxFiles(6),
                // ->required(),

            // \Orchid\Screen\Fields\Group::make([
            //     Button::make('Save Product')
            //         ->method('save')
            //         ->icon('check'),
            // ]),

            // Fields for adding dynamic custom fields
            Input::make('custom_fields')
                ->type('hidden')
                ->id('custom_fields_data') // Hidden field to store JSON data of custom fields
                ->value('[]'),

            Group::make([
                Input::make('new_field_name')
                    ->title('Field Name')
                    ->placeholder('Enter field name'),

                Input::make('new_field_value')
                    ->title('Field Value')
                    ->placeholder('Enter field value'),

                Button::make('Add Field')
                    ->icon('plus')
                    ->method('customSubmit')
                    ->parameters(['custom_param' => 'value'])
                    ->icon('arrow-right-circle')
                    ->id('add_field_button'), // Triggers dynamic input addition via JS
            ])->alignEnd(),

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
            TD::make('feature_image')->render(function ($model) {
                return '<img src="' . $model->feature_image . '" alt="Picture" width="50px" />';
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
        return [];
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

    /**
     * Custom method to handle form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customSubmit(\Illuminate\Http\Request $request)
    {
        // Perform custom actions, e.g., send data to another API or process it
        $customFieldValue = $request->get('custom_field');

        dd($customFieldValue);

        // Example: Redirect to another route after processing
        return redirect()->route('custom.route.name')->with('success', 'Data submitted successfully!');
    }
}
