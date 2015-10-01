<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок справки об обучении в другом ВУЗе.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_PackageData_Application_StudentDocument extends FIS_BaseElement {

	/**
	 * @var string Идентификатор в ИС ОО (не обязательное поле).
	 */
	public $UID;
	/**
	 * @var string Номер документа (обязательное поле).
	 */
	public $DocumentNumber;
	/**
	 * @var string Дата выдачи документа (обязательное поле).
	 */
	public $DocumentDate;
	/**
	 * @var string Организация, выдавшая документ (не обязательное поле).
	 */
	public $DocumentOrganisation;
	
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		if (!empty($this->UID))
			$node->appendChild(new DOMElement('UID', $this->UID));
		$node->appendChild(new DOMElement('DocumentNumber', $this->DocumentNumber));
		$node->appendChild(new DOMElement('DocumentDate', $this->DocumentDate));
		if (!empty($this->DocumentOrganisation))
			$node->appendChild(new DOMElement('DocumentOrganisation', $this->DocumentOrganisation));
		return $node;
	}

}