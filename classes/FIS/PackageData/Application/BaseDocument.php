<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных о прикрепленном документе.
 *
 * @category Class
 * @author Сергей С. Смирнов
 * @copyright 2010-14 RUSproj, Sergey S. Smirnov
 */
abstract class FIS_PackageData_Application_BaseDocument extends FIS_BaseElement {
	
	/**
	 * @var string Идентификатор в ИС ОУ (не обязательное поле).
	 */
	public $UID;
	/**
	 * @var bool Признак представления оригиналов документов (обязательное поле).
	 */
	public $OriginalReceived;
	/**
	 * @var DateTime Дата представления оригиналов документов (не обязательное поле).
	 */
	public $OriginalReceivedDate;
	/**
	 * @var string Серия документа (обязательное поле).
	 */
	public $DocumentSeries;
	/**
	 * @var string Номер документа (обязательное поле).
	 */
	public $DocumentNumber;
	/**
	 * @var DateTime Дата выдачи документа (не обязательное поле).
	 */
	public $DocumentDate;
	/**
	 * @var string Организация, выдавшая документ (не обязательное поле).
	 */
	public $DoumentOrganisation;
	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_Application_BaseDocument.
	 * @param bool $origReceive Признак представления оригиналов документов.
	 * @param string $ser Серия документа.
	 * @param string $num Номер документа.
	 * @param DateTime Дата выдачи документа.
	 */
	function __construct($origReceive = NULL, $ser = NULL, $num = NULL, $docDate = NULL) {
		$this->OriginalReceived = $origReceive;
		$this->DocumentSeries = $ser;
		$this->DocumentNumber = $num;
		$this->DocumentDate = $docDate;
	}
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		if (!empty($this->UID))
			$node->appendChild(new DOMElement('UID', $this->UID));
		$node->appendChild(new DOMElement('OriginalReceived', (($this->OriginalReceived === TRUE) ? 'true' : 'false')));
		if (!empty($this->OriginalReceivedDate))
			$node->appendChild(new DOMElement('OriginalReceivedDate', $this->OriginalReceivedDate));
		$node->appendChild(new DOMElement('DocumentSeries', $this->DocumentSeries));
		$node->appendChild(new DOMElement('DocumentNumber', $this->DocumentNumber));
		if (!empty($this->DocumentDate))
			$node->appendChild(new DOMElement('DocumentDate', $this->DocumentDate));
		if (!empty($this->DoumentOrganisation))
			$node->appendChild(new DOMElement('DoumentOrganisation', $this->DoumentOrganisation));
		return $node;
	}
	
}