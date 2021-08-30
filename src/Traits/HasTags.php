<?php

namespace Feadbox\Tags\Traits;

use Feadbox\Tags\Models\Tag;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasTags
{
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function tag(string $name, ?string $collection = null): Tag
    {
        $tag = Tag::firstOrCreate([
            'name' => $name,
            'collection' => $collection,
        ]);

        $this->tags()->attach($tag);
    }
}
