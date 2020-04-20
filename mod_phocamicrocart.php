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

require_once dirname(__FILE__) . '/helper.php';

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

$app = JFactory::getApplication();


$media = PhocacartRenderMedia::getInstance('main');

$media->loadBase();
$media->loadBootstrap();
$media->loadSpec();

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$labelCss        = $params->get('labelCss', 0);
$menuItem        = $params->get('menuItem', 0);
$enableAjax      = $params->get('enableAjax', 0);
$link            = '/';

if ($menuItem != 0)
{
	$link = JRoute::_("index.php?Itemid=" . (int) $menuItem);
}

$total = ModPhocamicrocartHelper::getItemCount();


require ModuleHelper::getLayoutPath('mod_phocamicrocart', $params->get('layout', 'default'));
