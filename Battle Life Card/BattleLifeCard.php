<?php

/**
 * @package ST Shop Battle Life Card
 * @version 2.0
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2020, SMF Tricks
 * @license https://www.mozilla.org/en-US/MPL/2.0/
 */

namespace Shop\Modules;

use Shop\Shop;
use Shop\Helper\Module;

if (!defined('SMF'))
	die('Hacking attempt...');

class BattleLifeCard extends Module
{
	/**
	 * BattleLifeCard::getItemDetails()
	 *
	 * Set the details and basics of the module, along with default values if needed.
	 */
	function getItemDetails()
	{
		// Item details
		$this->authorName = 'Diego Andrés';
		$this->authorWeb = 'https://smftricks.com/';
		$this->authorEmail ='admin@smftricks.com';
		$this->name = Shop::getText('blc_name');
		$this->desc = Shop::getText('blc_desc');
		$this->price = 350;
		$this->require_input = false;
		$this->can_use_item = true;
	}

	function getAddInput()
	{
		return;
	}

	function getUseInput()
	{
		return;
	}

	function onUse()
	{
		global $user_info;

		// Bring user back from the dead
		updateMemberData($user_info['id'], ['is_dead' => 0, 'hp' => 100]);
		
		// Display message box
		return '
			<div class="infobox">
				' . Shop::getText('blc_success') . '
			</div>';
	}
}
