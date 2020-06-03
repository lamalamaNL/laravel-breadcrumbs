<?php

namespace LamaLama\Breadcrumbs;

use Illuminate\Support\Facades\View;

class Breadcrumbs
{
    public static function trail($parts)
    {
        $divider = '<svg class="w-3 h-3 mx-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5l7 7-7 7"></path></svg>';

        $html = '<ol itemscope itemtype="https://schema.org/BreadcrumbList">';

        $i = 1;
        foreach ($parts as $label => $path) {
            $html .= '<li itemprop="itemListElement" itemscope
                          itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="'.url($path).'">
                            <span itemprop="name">'.$label.'</span></a>
                        <meta itemprop="position" content="'.$i.'" />
                      </li>';
            $i++;
        }
        $html .= '</ol>';

        View::share('breadcrumbs', $html);
    }
}
