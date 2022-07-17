<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tags = [
        [
          'name' => 'jaringan',
          'slug' => 'jaringan'
        ],
        [
          'name' => 'mobile',
          'slug' => 'mobile'
        ],
        [
          'name' => 'kota pintar',
          'slug' => 'kota-pintar'
        ],
        [
          'name' => 'aplikasi',
          'slug' => 'aplikasi'
        ],
        [
          'name' => 'android',
          'slug' => 'android'
        ],
        [
          'name' => 'staff kominfo',
          'slug' => 'staff-kominfo'
        ],
        [
          'name' => 'lambat',
          'slug' => 'lambat'
        ],
        [
          'name' => 'media sosial',
          'slug' => 'media-sosial'
        ],
        [
          'name' => 'berita',
          'slug' => 'berita'
        ],
        [
          'name' => 'internet',
          'slug' => 'internet'
        ],
        [
          'name' => 'perjalanan dinas',
          'slug' => 'perjalanan-dinas'
        ],
        [
          'name' => 'uang tambahan',
          'slug' => 'uang-tambahan'
        ]
      ];

      Tag::insert($tags);
    }
}
