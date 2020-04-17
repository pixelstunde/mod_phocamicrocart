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
$doc = JFactory::getDocument();

$doc->addStyleDeclaration(
	'
        .phocamicrocart{
            position: relative;
        }
        
        .phocamicrocart .label{
            background: ' . $labelCss . ';
            border-radius: 1rem;
            color: #fff;
            display: inline-block;
            height: 1rem;
            font-size: .75rem;
            line-height: 1rem;
            position: absolute;
            right: -.5rem;
            top: -.5rem;
            text-align: center;
            width: 1rem;
        }'
);
?>

<a href="<?php echo $link; ?>" class="phocamicrocart">
    <i class="fa fa-shopping-cart">
        <span class="label">
            <?php echo $total; ?>
        </span>
    </i>
</a>

<?php if ($enableAjax): ?>
    <script>
        const updateCart = setInterval(function () {
                var itemCount;
                jQuery.getJSON("/?option=com_ajax&module=phocamicrocart&method=getItemCount&format=json", function (data) {
                    if (data.success) {
                        jQuery('.phocamicrocart .label').text(data.data);
                    }
                });
            }
            , 3000);
    </script>
<?php endif; ?>
