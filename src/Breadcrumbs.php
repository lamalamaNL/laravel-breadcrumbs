<?php

namespace LamaLama\Breadcrumbs;

use Illuminate\Support\Facades\View;

class Breadcrumbs
{
    /**
     * trail.
     * @param  array $parts
     * @return void
     */
    public static function trail($parts)
    {
        if (! $parts) {
            return View::share('breadcrumbs', false);
        }

        $divider = '<svg class="w-3 h-3 mx-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5l7 7-7 7"></path></svg>';

        $html = '<ol class="flex items-center text-gray-500" itemscope itemtype="https://schema.org/BreadcrumbList">';

        $i = 1;
        foreach ($parts as $label => $path) {
            $html .= '<li itemprop="itemListElement" itemscope
                          itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="'.url($path).'">
                            <span itemprop="name">'.$label.'</span></a>
                        <meta itemprop="position" content="'.$i.'" />
                      </li>';

            if ($i < count($parts)) {
                $html .= '<svg class="w-3 h-3 mx-3" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5l7 7-7 7"></path></svg>';
            }

            $i++;
        }
        $html .= '</ol>';

        return View::share('breadcrumbs', $html);
    }

    /**
     * generate.
     * @param  boolean $minify
     * @return void
     */
    public static function generate($minify = false)
    {
        $html = '';

        return ($minify) ? str_replace(PHP_EOL, '', $html) : $html;
    }
}
