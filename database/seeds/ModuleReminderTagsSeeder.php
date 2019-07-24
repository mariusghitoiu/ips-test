<?php

use App\Http\Helpers\InfusionsoftHelper;
use App\ModuleReminderTag;
use Illuminate\Database\Seeder;

class ModuleReminderTagsSeeder extends Seeder
{
    /**
     * @var InfusionsoftHelper
     */
    private $infusionsoftHelper;

    public function __construct(InfusionsoftHelper $infusionsoftHelper)
    {
        $this->infusionsoftHelper = $infusionsoftHelper;
    }

    /**
     * This was created for current specific context to be able
     * to recreate the database easily for local tests.
     * In a real application this will be seeded in
     * a different way.
     *
     * @return void
     */
    public function run()
    {
        if (!ModuleReminderTag::query()->count(['*'])) {
            $response = collect($this->infusionsoftHelper->getAllTags());
            $tags = $response->filter(function ($tag) {
                if (!$tag->category) {
                    return true;
                }
            })->map(function ($tag) {
                return [
                    'id' => $tag->id,
                    'name' => $tag->name,
                    'description' => $tag->description
                ];
            });
            ModuleReminderTag::insert($tags->toArray());
        }
    }
}
