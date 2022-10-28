<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class HeaderEmoji extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.header',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'emoji' => $this->headerEmoji(),
        ];
    }


    /**
     * Returns an emoji per PHP session.
     *
     * @return string
     */
    public function headerEmoji()
    {
        $emoji = '';

        if (!is_admin()) {
            $headerEmojiList = get_field('header_emojis', 'option');

            if (get_field('has_header_unique_emoji', 'option') === true) {
                $emoji = get_field('header_unique_emoji', 'option');
            } else {
                if (!array_key_exists("header_emoji", $_SESSION)) {
                    $_SESSION["header_emoji"] = $headerEmojiList[array_rand($headerEmojiList)];
                }
                $emoji = $_SESSION["header_emoji"];
            }
        }

        return $emoji;
    }
}
