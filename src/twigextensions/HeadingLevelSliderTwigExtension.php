<?php
/**
 * HeadingLevelSlider plugin for Craft CMS 3.x
 *
 * Slide level of HTML hx(h1-h6) tag 
 *
 * @link      https://www.anothersky.pw
 * @copyright Copyright (c) 2017 Hideki Abe
 */

namespace hidekia\headinglevelslider\twigextensions;

use hidekia\headinglevelslider\HeadingLevelSlider;

use Craft;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Hideki Abe
 * @package   HeadingLevelSlider
 * @since     1.0.0
 */
class HeadingLevelSliderTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'HeadingLevelSlider';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('hnslider', [$this, 'hnSlider'], [
            'is_safe' => ['html']]),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('hnslider', [$this, 'hnSlider'], []),
        ];
    }

    /**
     * 
     *
     * @param string $html
     * @param int $minLevel
     *
     * @return string
     */
    /**
     * @return string
     */
    public function hnSlider($html, $minLevel = 2)
    {
        $meta = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
        $result = \Vikpe\HtmlHeadingNormalizer::min($meta . $html, $minLevel);
        $result = str_replace($meta, '', $result);

        return $result;
    }
}
