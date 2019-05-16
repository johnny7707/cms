<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\User;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
  use softDeletes;

  protected $fillable = ['title', 'slug', 'excerpt', 'body', 'published_at', 'category_id', 'image'];
  protected $dates = ['published_at'];

    // protected $fillable = ['view_count'];

	public function author()
	{
		return $this->belongsTo(User::class);
    }

    public function category()
    {
         return $this->belongsTo(Category::class);

    }

    public function getImageUrlAttribute($value)
    {
    	$imageUrl = "";

    	if ( ! is_null($this->image))
    	{
        $directory = config('cms.image.directory');
    		$imagePath = public_path() . "/{$directory}/" . $this->image;
    		if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" .$this->image);
    	}

    	return $imageUrl;
    }

    public function getImageThumbUrlAttribute($value)
    {
      $imageUrl = "";

      if ( ! is_null($this->image))
      {
        $directory = config('cms.image.directory');
        $ext = substr(strrchr($this->image, '.'), 1);
        $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
        $imagePath = public_path() . "/{$directory}/" . $thumbnail;
        if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" .$this->image);
      }

      return $imageUrl;
    }

    public function getDateAttribute($value)
    {
    	// Set Date function

    //	return $this->created_at->diffForHumans();

        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();

    }

    public function scopeLatestFirst($query)
    {
    	return $query->orderBy('created_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where("published_at" , "<=", Carbon::now());
    }

    public function scopeScheduled($query)
    {
        return $query->where("published_at" , ">", Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }

    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getExcerptHtmlAttribute($value)
    {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }

    public function scopePopular($query)
    {
    	return $query->orderBy('view_count', 'desc');
    }

    public function dateFormatted($showTimes = false)
    {
      $format = "d/m/Y";
      if($showTimes) $format = $format . " H:i:s";
      return $this->created_at->format($format);
    }

    public function publicationLabel()
    {
        if ( ! $this->published_at) {
            return '<span class="label label-warning">ร่าง</span>';
        }
        elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<span class="label label-info">กำหนด</span>';
        }
        else {
            return '<span class="label label-success">เผยแพร่</span>';
        }
    }

}
