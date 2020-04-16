<?php
/**
 * @package    phocamicrocart
 *
 * @author     Chrisitian <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined('_JEXEC') or die;

$style = '
    .phocamicrocart
    {
        display:inline-block;
        position:relative;
    }
    
    .phocamicrocart .label{
        background:' . $labelCSS .';
        border-radius: 1rem;
        display: inline-block;
        color: #fff;
        font-size: .75rem;
        line-height: 1rem;
        height: 1rem;
        right: -.5rem;
        position: absolute;
        text-align: center;
        top: -.5rem;
        width: 1rem;
    }
';

$doc = JFactory::getDocument();
$doc->addStyleDeclaration($style);
// Access to module parameters
?>

<a href="<?php echo $link ?>" class="phocamicrocart"><i class="fa fa-shopping-cart"><span class="label"><?php echo $total ?></span></i></a>
