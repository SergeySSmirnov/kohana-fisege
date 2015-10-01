<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных о документе, представляющем результат вступительного испытания ОУ.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_PackageData_Application_EntranceTestResultInstitutionDocument extends FIS_BaseElement {

	/**
	 * @var string Номер документа (обязательное поле).
	 */
	public $DocumentNumber;
	/**
	 * @var date Дата выдачи документа (не обязательное поле).
	 */
	public $DocumentDate;
	/**
	 * @var int Тип документа из справочника №33 (не обязательное поле).
	 */
	public $DocumentTypeID;
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_Application_EntranceTestResultInstitutionDocument.
	 * @param string $docNum Номер документа.
	 * @param string $docDate Дата выдачи документа.
	 * @param string $docType Тип документа из справочника №33.
	 */
	function __construct($docNum, $docDate = NULL, $docType = NULL) {
		$this->DocumentNumber = $docNum;
		$this->DocumentDate = $docDate;
		$this->DocumentTypeID = $docType;
	}
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$_subNode = $node->appendChild(new DOMElement('InstitutionDocument'));
		$_subNode->appendChild(new DOMElement('DocumentNumber', $this->DocumentNumber));
		if (!empty($this->DocumentDate))
			$_subNode->appendChild(new DOMElement('DocumentDate', $this->DocumentDate));
		if (!empty($this->DocumentTypeID))
			$_subNode->appendChild(new DOMElement('DocumentTypeID', $this->DocumentTypeID));
		return $node;
	}

}