<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogCategoryObserver
{

    public function creating(BlogCategory $blogCategory)
    {
        //
    }

    public function updating(BlogCategory $blogCategory)
    {
        $this->setPublishedAt($blogCategory);
        $this->setSlug($blogCategory);
    }

    public function setSlug($blogCategory)
    {
        if(empty($blogCategory->slug)){
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }

    public function setPublishedAt($blogCategory)
    {
        if(empty($blogCategory->published_at) && $blogCategory->is_published){
            $blogCategory->published_at = Carbon::now();
        }
    }

    /**
     * Handle the BlogCategory "created" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function created(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "updated" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function updated(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "deleted" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function deleted(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "restored" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function restored(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "force deleted" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $blogCategory)
    {
        //
    }
}
