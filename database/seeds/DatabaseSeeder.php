<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $postCountPerUser = 20;
        $taxonomyCount = 10;

        factory(App\User::class, $postCountPerUser)->create()->each(
            function ($user) {
                for ($i = 1; $i <= 10; $i++) {
                    $post = $user->posts()->save(
                        factory(App\Post::class)->make()
                    );
                }
            }
        );
        factory(App\Taxonomy::class, $taxonomyCount)->create();
        for ($p = 1; $p <= $postCountPerUser; $p++) {
            if ($p % 2 == 0) {
                for ($t = 1; $t <= $taxonomyCount; $t++) {
                    if ($t % 3 == 0) {
                        factory(App\PostTaxonomy::class)->create(
                            [
                                'post_id' => $p,
                                'taxonomy_id' => $t,
                            ]
                        );
                    }
                }
            }
        }
    }
}
