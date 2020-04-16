<?php
/**
 * @package    mod_phocamicrocart
 *
 * @author     Chrisitian <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */
ini_set('display_errors', 1);

use Joomla\CMS\Helper\ModuleHelper;

defined('_JEXEC') or die;

if (!JComponentHelper::isEnabled('com_phocacart', true))
{
	$app = JFactory::getApplication();
	$app->enqueueMessage(JText::_('Phoca Cart Error'), JText::_('Phoca Cart is not installed on your system'), 'error');

	return;
}

JLoader::registerPrefix('Phocacart', JPATH_ADMINISTRATOR . '/components/com_phocacart/libraries/phocacart');

$lang = JFactory::getLanguage();
//$lang->load('com_phocacart.sys');
$lang->load('com_phocacart');


$app  = JFactory::getApplication();
$cart = new PhocacartCart();
$cart->setFullItems();

$media = PhocacartRenderMedia::getInstance('main');
if ($p['load_component_media'] == 1)
{
	$media->loadBase();
	$media->loadBootstrap();
	$media->loadSpec();
}


$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$labelCSS        = $params->get('labelCss', 0);
$menuItem        = $params->get('menuItem', 0);
$link            = '/';

if ($menuItem != 0)
{
	$link = JRoute::_("index.php?Itemid=" . (int) $menuItem);
}

$total = 0;

foreach ($cart->getItems() as $item)
{
	$total += $item['quantity'];
}

require ModuleHelper::getLayoutPath('mod_phocamicrocart', $params->get('layout', 'default'));