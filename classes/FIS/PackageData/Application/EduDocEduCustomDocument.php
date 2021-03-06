<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об ином документе об образовании.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 */
class FIS_PackageData_Application_EduDocEduCustomDocument extends FIS_PackageData_Application_BaseDocument {

	/**
	 * @var string Наименование документа (обязательное поле).
	 */
	public $DocumentTypeNameText;
	
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node = $node->appendChild(new DOMElement('EduCustomDocument'));
		$node = parent::GetNode($node);
		$node->appendChild(new DOMElement('DocumentTypeNameText', $this->DocumentTypeNameText));
		return $node;
	}
	
}