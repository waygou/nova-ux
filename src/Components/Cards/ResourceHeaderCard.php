<?php

namespace Waygou\NovaUx\Components\Cards;

use Laravel\Nova\Card;

class ResourceHeaderCard extends Card
{
    public $width = 'full';

    public function withHeader($header = null)
    {
        return $this->withMeta(['header' => $header]);
    }

    public function withContentLine1($content = null)
    {
        return $this->withMeta(['content_line_1' => $content]);
    }

    public function withContentLine2($content = null)
    {
        return $this->withMeta(['content_line_2' => $content]);
    }

    public function withContentLine3($content = null)
    {
        return $this->withMeta(['content_line_3' => $content]);
    }

    public function withSVG($svg = null)
    {
        return $this->withMeta(['svg' => $svg]);
    }

    public function withLink($text = null, $url = null)
    {
        return $this->withMeta(['link_text' => $text, 'link_url' => $url]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'resource-header-card';
    }
}
