<?php

namespace App\Traits;

use App\Models\Category;

trait TreeTrait
{
    public static function tree()
    {
        $categories = self::where('status', 1)->get();
        $rootCategories = $categories->where('parent_id', null);

        self::formatTree($rootCategories, $categories);

        return $rootCategories;
    }

    private static function formatTree($rootCategories, $categories)
    {
        foreach ($rootCategories as $category) {
            $category->children = $categories->where('parent_id', $category->id);

            if ($category->children->isNotEmpty()) {
                self::formatTree($category->children, $categories);
            }
        }
    }

    public function isChild(): bool
    {
        return $this->parent_id !== null;
    }
}