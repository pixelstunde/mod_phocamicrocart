<?php

if (!JComponentHelper::isEnabled('com_phocacart', true))
{
	$app = JFactory::getApplication();
	$app->enqueueMessage(JText::_('Phoca Cart Error'), JText::_('Phoca Cart is not installed on your system'), 'error');

	return;
}

JLoader::registerPrefix('Phocacart', JPATH_ADMINISTRATOR . '/components/com_phocacart/libraries/phocacart');

class ModPhocamicrocartHelper
{
	public static function getItemCount()
	{
		$cart = new PhocacartCart();
		$cart->setFullItems();
		$total = 0;

		foreach ($cart->getItems() as $item)
		{
			$total += $item['quantity'];
		}

		return $total;
	}

	public static function getItemCountAjax()
	{
		return self::getItemCount();
	}
}
