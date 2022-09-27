<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'emoji' => $this->headerEmoji(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * Returns an emoji per PHP session.
     *
     * @return string
     */
    public function headerEmoji()
    {
        $headerEmojiList = get_field('header_emojis', 'option');

        if (get_field('has_header_unique_emoji', 'option') === true) {
            $emoji = get_field('header_unique_emoji', 'option');
        } else {
            if (!array_key_exists("header_emoji", $_SESSION)) {
                $_SESSION["header_emoji"] = $headerEmojiList[array_rand($headerEmojiList)];
            }
            $emoji = $_SESSION["header_emoji"];
        }



        return $emoji;
    }
}
