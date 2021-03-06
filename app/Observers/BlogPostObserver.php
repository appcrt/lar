<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    public function creating(BlogPost $blogPost)
    {
        $this->setUserId($blogPost);
        $this->setPublishedAt($blogPost);
        $this->setHtml($blogPost);
        $this->setSlug($blogPost);
    }

    public function setHtml($blogPost)
    {
        if($blogPost->isDirty('content_raw')){
            //markdown
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
    }

    public function setUserId($blogPost)
    {
        if(empty($blogPost->user_id)){
            $blogPost->user_id = BlogPost::UNKNOWN_USER;
        }
    }

    /**
     * Handle the BlogPost "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {

    }

    public function setSlug($blogPost)
    {
        if(empty($blogPost->slug)){
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }

    public function setPublishedAt($blogPost)
    {
        if(empty($blogPost->published_at) && $blogPost->is_published){
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     * Handle the BlogPost "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
