<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\cms\subshop\events;

use bl\cms\subshop\base\ShopEvent;

/**
 * Edit event definition class
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class EditEvent extends ShopEvent
{
    const EVENT_SUB_SHOP_EDIT = 'subShopEdit';
}