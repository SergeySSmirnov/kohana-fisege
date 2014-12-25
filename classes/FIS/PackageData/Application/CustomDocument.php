<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об ином документе.
 *
 * @category Class
 * @author Сергей С. Смирнов
 * @copyright 2013-14 Ivanovo State University od Chemistry and Technology
 */
class FIS_PackageData_Application_CustomDocument extends FIS_PackageData_Application_BaseDocument {

	/**
	 * @var string Наименование документа (обязательное поле).
	 */
	public $DocumentTypeNameText;
	/**
	 * @var string Дополнительные сведения (не обязательное поле).
	 */
	public $AdditionalInfo;
	
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node = parent::GetNode($node);
		$node->appendChild(new DOMElement('DocumentTypeNameText', $this->DocumentTypeNameText));
		if (!empty($this->AdditionalInfo))
			$node->appendChild(new DOMElement('AdditionalInfo', $this->AdditionalInfo));
		return $node;
	}
	
}