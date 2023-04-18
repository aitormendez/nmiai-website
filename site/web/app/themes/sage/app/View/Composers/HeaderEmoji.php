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
            'array_emoji' => $this->headerEmoji(),
        ];
    }


    /**
     * Returns an emoji per PHP session.
     *
     * @return string
     */
    public function headerEmoji()
    {
        $headerEmojiList = get_field('header_emojis', 'option');
        $header_type = get_field('header_type', 'option');

        $array = [
            'header_type' => $header_type,
            'emoji' => [],
        ];

        if ($header_type === 'fixed') {
            if (get_field('unique_emoji_or_image', 'option') === true) {
                $array['emoji']['emoji_or_image'] = true;
                $array['emoji']['header_emoji'] = get_field('header_unique_emoji', 'option');
            } else {
                $array['emoji']['emoji_or_image'] = false;
                $array['emoji']['header_image'] = get_field('header_unique_image', 'option');
            }
        } else if ($header_type === 'random_list') {
            if (!array_key_exists('header_emoji', $_SESSION)) {
                $_SESSION = $headerEmojiList[array_rand($headerEmojiList)];
            }
            $array['emoji'] = $_SESSION;
        } else if ($header_type === 'slot_machine') {
            $emoji_list = get_field('header_emojis_slot_machine', 'option');

            $element_emojis = array_map(function ($emo) {
                return $emo['emoji_or_image_slot_machine'] ? $emo['header_emoji_slot_machine'] : '<img src="' . $emo['header_image_slot_machine']['url'] . '" alt="' . $emo['header_image_slot_machine']['alt'] . '">';
            }, $emoji_list);

            $array['emoji'] = $emoji_list;
            $array['element_emojis'] = $element_emojis;
        }

        return $array;
    }
}