<?php

namespace LamaLama\Breadcrumbs;

class Breadcrumbs
{
    /**
     * $html.
     * @var string
     */
    public $html = '';

    /**
     * trail.
     * @param  array $parts
     * @return void
     */
    public function trail($parts = false)
    {
        if (! $parts) {
            return;
        }

        $divider = '<li><svg class="w-3 h-3 mx-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5l7 7-7 7"></path></svg></li>';

        $this->html = '<ol class="flex items-center text-gray-500" itemscope itemtype="https://schema.org/BreadcrumbList">';

        $i = 1;
        foreach ($parts as $label => $path) {
            $this->html .= '<li itemprop="itemListElement" itemscope
                          itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="'.url($path).'">
                            <span itemprop="name">'.$label.'</span></a>
                        <meta itemprop="position" content="'.$i.'" />
                      </li>';

            if ($i < count($parts)) {
                $this->html .= '<svg class="w-3 h-3 mx-3" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5l7 7-7 7"></path></svg>';
            }

            $i++;
        }
        $this->html .= '</ol>';
    }

    /**
     * Check if Breadcrumbs exists.
     * @param  bool $minify
     * @return void
     */
    public function exists()
    {
        return (blank($this->html))
            ? false
            : true;
    }

    /**
     * generate.
     * @param  bool $showHome
     * @return void
     */
    public function generate()
    {
        return $this->html;
    }
}
