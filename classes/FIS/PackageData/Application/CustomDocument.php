<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об ином документе.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_PackageData_Application_CustomDocument extends FIS_PackageData_Application_BaseDocument {

	/**
	 * @var string Идентификатор в ИС ОО (не обязательное поле).
	 */
	public $UID;
	/**
	 * @var string Поле зарезервировано (значение не обрабатывается).
	 */
	public $OriginalReceived;
	/**
	 * @var string Дата представления оригиналов документов (не обязательное поле).
	 */
	public $OriginalReceivedDate;
	/**
	 * @var string Серия документа (не обязательное поле).
	 */
	public $DocumentSeries;
	/**
	 * @var string Номер документа (не обязательное поле).
	 */
	public $DocumentNumber;
	/**
	 * @var string Дата выдачи документа (не обязательное поле).
	 */
	public $DocumentDate;
	/**
	 * @var string Организация, выдавшая документ (не обязательное поле).
	 */
	public $DocumentOrganisation;
	/**
	 * @var string Дополнительные сведения (не обязательное поле).
	 */
	public $AdditionalInfo;
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
		$node = parent::GetNode($node);
		if (!empty($this->UID))
			$node->appendChild(new DOMElement('UID', $this->UID));
		if (!empty($this->OriginalReceived))
			$node->appendChild(new DOMElement('OriginalReceived', $this->OriginalReceived));
		if (!empty($this->OriginalReceivedDate))
			$node->appendChild(new DOMElement('OriginalReceivedDate', $this->OriginalReceivedDate));
		if (!empty($this->DocumentSeries))
			$node->appendChild(new DOMElement('DocumentSeries', $this->DocumentSeries));
		if (!empty($this->DocumentNumber))
			$node->appendChild(new DOMElement('DocumentNumber', $this->DocumentNumber));
		if (!empty($this->DocumentDate))
			$node->appendChild(new DOMElement('DocumentDate', $this->DocumentDate));
		if (!empty($this->DocumentOrganisation))
			$node->appendChild(new DOMElement('DocumentOrganisation', $this->DocumentOrganisation));
		if (!empty($this->AdditionalInfo))
			$node->appendChild(new DOMElement('AdditionalInfo', $this->AdditionalInfo));
		$node->appendChild(new DOMElement('DocumentTypeNameText', $this->DocumentTypeNameText));
		return $node;
	}
	
}