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

/**
 *
 * @class Shopgate_Model_Media_Image
 * @see http://developer.shopgate.com/file_formats/xml/products
 *
 *  @method         setUid(int $value)
 *  @method int     getUid()
 *
 *  @method         setSortOrder(int $value)
 *  @method int     getSortOrder()
 *
 *  @method         setUrl(string $value)
 *  @method string  getUrl()
 *
 *  @method         setTitle(string $value)
 *  @method string  getTitle()
 *
 *  @method         setAlt(string $value)
 *  @method string  getAlt()
 *
 *  @method         setIsCover(bool $value)
 *  @method string  getIsCover()
 *
 */
class Shopgate_Model_Media_Image extends Shopgate_Model_AbstractExport {

	/**
	 * define allowed methods
	 *
	 * @var array
	 */
	protected $allowedMethods = array(
		'Uid',
		'SortOrder',
		'Url',
		'Title',
		'Alt',
		'IsCover');

	/**
	 * @param Shopgate_Model_XmlResultObject $itemNode
	 *
	 * @return Shopgate_Model_XmlResultObject
	 */
	public function asXml(Shopgate_Model_XmlResultObject $itemNode) {
		/**
		 * @var Shopgate_Model_XmlResultObject $imageNode
		 */
		$imageNode = $itemNode->addChild('image');
		$imageNode->addAttribute('uid', $this->getUid());
		$imageNode->addAttribute('sort_order', $this->getSortOrder());
		$imageNode->addAttribute('is_cover', $this->getIsCover());
		$imageNode->addChildWithCDATA('url', $this->getUrl());
		$imageNode->addChildWithCDATA('title', $this->getTitle(), false);
		$imageNode->addChildWithCDATA('alt', $this->getAlt(), false);

		return $itemNode;
	}

	/**
	 * @return array|null
	 */
	public function asArray() {
		$imageResult = new Shopgate_Model_Media_Image();

		$imageResult->setUid($this->getUid());
		$imageResult->setSortOrder($this->getSortOrder());
		$imageResult->setUrl($this->getUrl());
		$imageResult->setTitle($this->getTitle());
		$imageResult->setAlt($this->getAlt());
		$imageResult->setIsCover($this->getIsCover());

		return $imageResult->getData();

	}
}