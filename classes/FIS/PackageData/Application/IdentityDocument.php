<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных о документе, удостоверяющем личность.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_PackageData_Application_IdentityDocument extends FIS_BaseElement {

	/**
	 * @var string Идентификатор в ИС ОУ (не обязательное поле).
	 */
	public $UID;
	/**
	 * @var bool Поле зарезервировано. Значение не обрабатывается (не обязательное поле).
	 */
	public $OriginalReceived;
	/**
	 * @var DateTime Дата представления оригиналов документов (не обязательное поле).
	 */
	public $OriginalReceivedDate;
	/**
	 * @var string Серия документа (не обязательное поле).
	 */
	public $DocumentSeries;
	/**
	 * @var string Номер документа (обязательное поле).
	 */
	public $DocumentNumber;
	/**
	 * @var string Код подразделения (не обязательное поле).
	 */
	public $SubdivisionCode;
	/**
	 * @var DateTime Дата выдачи документа (обязательное поле).
	 */
	public $DocumentDate;
	/**
	 * @var string Кем выдан (не обязательное поле).
	 */
	public $DocumentOrganisation;
	/**
	 * @var int ИД типа документа из справочника №22 (обязательное поле).
	 */
	public $IdentityDocumentTypeID;
	/**
	 * @var int ИД гражданства из справочника №7 (обязательное поле).
	 */
	public $NationalityTypeID;
	/**
	 * @var DateTime Дата рождения (обязательное поле).
	 */
	public $BirthDate;
	/**
	 * @var string Место рождения  (не обязательное поле).
	 */
	public $BirthPlace;
	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_Application_IdentityDocument.
	 * @param bool $origReceived Признак представления оригинала документов.
	 * @param string $ser Серия документа.
	 * @param string $num Номер документа.
	 * @param DateTime $date Дата выдачи документа.
	 * @param int $type ИД типа документа из справочника №22.
	 * @param int $nation ИД гражданства из справочника №7.
	 * @param DateTime $birth Дата рождения.
	 */
	function __construct($ser = NULL, $num = NULL, $date = NULL, $type = NULL, $nation = NULL, $birth = NULL) {
		$this->DocumentSeries = $ser;
		$this->DocumentNumber = $num;
		$this->DocumentDate = $date;
		$this->IdentityDocumentTypeID = $type;
		$this->NationalityTypeID = $nation;
		$this->BirthDate = $birth;
	}
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		if(!empty($this->UID))
			$node->appendChild(new DOMElement('UID', $this->UID));
		if(!empty($this->OriginalReceivedDate))
			$node->appendChild(new DOMElement('OriginalReceivedDate', $this->OriginalReceivedDate));
		if(!empty($this->DocumentSeries))
			$node->appendChild(new DOMElement('DocumentSeries', $this->DocumentSeries));
		$node->appendChild(new DOMElement('DocumentNumber', $this->DocumentNumber));
		if(!empty($this->SubdivisionCode))
			$node->appendChild(new DOMElement('SubdivisionCode', $this->SubdivisionCode));
		$node->appendChild(new DOMElement('DocumentDate', $this->DocumentDate));
		if(!empty($this->DocumentOrganisation))
			$node->appendChild(new DOMElement('DocumentOrganisation', $this->DocumentOrganisation));
		$node->appendChild(new DOMElement('IdentityDocumentTypeID', $this->IdentityDocumentTypeID));
		$node->appendChild(new DOMElement('NationalityTypeID', $this->NationalityTypeID));
		$node->appendChild(new DOMElement('BirthDate', $this->BirthDate));
		if(!empty($this->BirthPlace))
			$node->appendChild(new DOMElement('BirthPlace', $this->BirthPlace));
		return $node;
	}

}