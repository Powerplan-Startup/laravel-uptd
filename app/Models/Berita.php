<?php

namespace App\Models;

class Berita
{
    private static  $blog_posts = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-pertama",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est eaque omnis dolore? Repudiandae aliquid fugiat cum quo quaerat. Est nam earum, cupiditate ea repellendus magnam repellat veniam recusandae? Explicabo neque magni earum facere culpa porro vel modi unde dignissimos architecto impedit dolores quis ipsa repellat necessitatibus, aliquam eaque vero assumenda dolorum. Eos necessitatibus nobis impedit. Nihil enim vitae esse laborum itaque temporibus ratione ipsum voluptate fuga, ut sint odio incidunt quia consequuntur nisi assumenda ducimus. Ipsa incidunt similique earum ea dolorum quo ut quam ducimus! Perspiciatis nam recusandae ipsum quam, neque labore doloremque aliquam aspernatur ut, vel ipsa expedita architecto."
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad repudiandae autem sequi itaque modi, corrupti cum architecto unde deleniti molestias aut id iste enim corporis! Tempore quasi id eveniet architecto aut, blanditiis necessitatibus iste, cupiditate, officia omnis aliquam vero. Nihil, eligendi. Porro ipsa harum id, aliquam perferendis velit dicta? Tenetur facere distinctio accusantium maxime mollitia dignissimos, minima inventore quae, dolore eos, qui architecto deleniti fugit. Adipisci nemo nulla reiciendis nesciunt? Error pariatur fugit quidem enim dolore numquam rerum hic, distinctio voluptate molestiae qui obcaecati doloribus. Delectus hic earum ipsa odio."
        ]
        ];

        public static function all()
        {
            return collect(self::$blog_posts);
        }

        public static function find($slug)
        {
            $posts = static::all();            
            return $posts->firstWhere('slug', $slug);
        }
    
}
