<?php
/**
 * Shopgate GmbH
 *
 * URHEBERRECHTSHINWEIS
 *
 * Dieses Plugin ist urheberrechtlich geschützt. Es darf ausschließlich von Kunden der Shopgate GmbH
 * zum Zwecke der eigenen Kommunikation zwischen dem IT-System des Kunden mit dem IT-System der
 * Shopgate GmbH über www.shopgate.com verwendet werden. Eine darüber hinausgehende Vervielfältigung, Verbreitung,
 * öffentliche Zugänglichmachung, Bearbeitung oder Weitergabe an Dritte ist nur mit unserer vorherigen
 * schriftlichen Zustimmung zulässig. Die Regelungen der §§ 69 d Abs. 2, 3 und 69 e UrhG bleiben hiervon unberührt.
 *
 * COPYRIGHT NOTICE
 *
 * This plugin is the subject of copyright protection. It is only for the use of Shopgate GmbH customers,
 * for the purpose of facilitating communication between the IT system of the customer and the IT system
 * of Shopgate GmbH via www.shopgate.com. Any reproduction, dissemination, public propagation, processing or
 * transfer to third parties is only permitted where we previously consented thereto in writing. The provisions
 * of paragraph 69 d, sub-paragraphs 2, 3 and paragraph 69, sub-paragraph e of the German Copyright Act shall remain unaffected.
 *
 * @author Shopgate GmbH <interfaces@shopgate.com>
 */

if (!defined('DS')) define('DS', '/');

if( file_exists(dirname(__FILE__).DS.'dev.php') )
    require_once(dirname(__FILE__).DS.'dev.php');

// Library
require_once(dirname(__FILE__).DS.'classes'.DS.'core.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'apis.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'configuration.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'customers.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'orders.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'external_orders.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'items.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'redirect.php');

/**
 * global
 */
require_once(dirname(__FILE__).DS.'classes'.DS.'models/Abstract.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/AbstractExport.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/XmlEmptyObject.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/XmlResultObject.php');
/**
 * catalog
 */
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Review.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Product.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Price.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/TierPrice.php');

require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Category.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/CategoryPath.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Shipping.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Manufacturer.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Visibility.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Property.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Stock.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Identifier.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Tag.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Relation.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Attribute.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Input.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Validation.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Option.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/AttributeGroup.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'models/catalog/Attribute.php');

/**
 * helper
 */
require_once(dirname(__FILE__).DS.'classes'.DS.'helper/DataStructure.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'helper/Pricing.php');
require_once(dirname(__FILE__).DS.'classes'.DS.'helper/String.php');

/**
 * media
 */
require_once(dirname(__FILE__).DS.'classes'.DS.'models/media/Image.php');

// Shopgate-Vendors
require_once(dirname(__FILE__).DS.'vendors'.DS.'2d_is.php');

// External-Vendors
include_once(dirname(__FILE__).DS.'vendors'.DS.'JSON.php');
