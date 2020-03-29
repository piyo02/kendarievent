<?php

namespace App\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;
use Image;
use URL;

class News extends MyBaseModel
{
    use SoftDeletes;
    
    protected $table = 'news';
    protected $fillable = ['title', 'image', 'preview'];

    /**
     * The validation rules for the model.
     *
     * @var array $rules
     */
    protected $rules = [
        'title'         => ['required'],
        'preview'       => ['required'],
        'image'         => ['mimes:jpeg,jpg,png', 'max:10000'],
        'content'       => ['required'],
    ];

    /**
     * The validation error messages for the model.
     *
     * @var array $messages
     */
    protected $messages = [
        'title.required'        => 'You must at least give a title for the news.',
        'image.max'             => 'Please upload an image smaller than 10Mb',
        'image.size'            => 'Please upload an image smaller than 10Mb',
    ];

    /**
     * Set a new Logo for the Organiser
     *
     * @param \Illuminate\Http\UploadedFile $file
     */
    public function uploadImage(UploadedFile $file)
    {
        $filename = 'NEWS_'.time().'.'.strtolower($file->getClientOriginalExtension());
        // Image Directory
        $imageDirectory = public_path() . '/user_content/news/photos';

        // Paths
        $relativePath = '/user_content/news/photos'.'/'.$filename;
        $absolutePath = public_path($relativePath);

        $file->move($imageDirectory, $filename);

        $img = Image::make($absolutePath);

        $img->save($absolutePath);

        if (file_exists($absolutePath)) {
            $this->image = $relativePath;
        }
    }

    /**
     * The organizer associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organiser()
    {
        return $this->belongsTo(\App\Models\Organiser::class);
    }

    /**
     * Adds extra validator rules to the organiser object depending on whether tax is required or not
     */
    public function addExtraValidationRules() {
        $this->rules = $this->rules;
    }
}
