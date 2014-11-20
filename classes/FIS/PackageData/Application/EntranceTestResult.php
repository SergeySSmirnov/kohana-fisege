<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных результате вступительного испытания.
 *
 * @category Class
 * @author Сергей С. Смирнов
 * @copyright 2010-14 RUSproj, Sergey S. Smirnov
 */
class FIS_PackageData_Application_EntranceTestResult extends FIS_BaseElement {

	/**
	 * @var string Идентификатор в ИС ОУ (обязательное поле).
	 */
	public $UID;
	/**
	 * @var string Балл (обязательное поле).
	 */
	public $ResultValue;
	/**
	 * @var int ИД основания для оценки по справочнику №6 (обязательное поле).
	 */
	public $ResultSourceTypeID;
	/**
	 * @var int/string ИД дисциплины по справочнику №1 или название дисциплины в ОУ (обязательное поле).
	 */
	public $SubjectName;
	/**
	 * @var int ИД типа вступительного испытания по справочнику №11 (обязательное поле).
	 */
	public $EntranceTestTypeID;
	/**
	 * @var string ИД конкурсной группы (обязательное поле).
	 */
	public $CompetitiveGroupID;
// FUTURE: Реализовать генерацию ResultDocument
// 	/**
// 	 * @var Unknown Сведения об основаниях оценки (не обязательное поле).
// 	 */
// 	public $ResultDocument;
	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_Application_EntranceTestResult.
	 * @param string $uid Идентификатор в ИС ОУ.
	 * @param string $result Оценка.
	 * @param string $resTypeID ИД основания для оценки по справочнику №6.
	 * @param int/string $subjName ИД дисциплины по справочнику №1 или название дисциплины в ОУ.
	 * @param string $eTestID ИД типа вступительного испытания по справочнику №11.
	 * @param string $compGrID ИД конкурсной группы.
	 */
	function __construct($uid = NULL, $result = NULL, $resTypeID = NULL, $subjName = NULL, $eTestID = NULL, $compGrID = NULL) {
		$this->UID = $uid;
		$this->ResultValue = $result;
		$this->ResultSourceTypeID = $resTypeID;
		$this->SubjectName = $subjName;
		$this->EntranceTestTypeID = $eTestID;
		$this->CompetitiveGroupID = $compGrID;	
	}
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node->appendChild(new DOMElement('UID', $this->UID));
		$node->appendChild(new DOMElement('ResultValue', $this->ResultValue));
		$node->appendChild(new DOMElement('ResultSourceTypeID', $this->ResultSourceTypeID));
		$entranceTestSubject = $node->appendChild(new DOMElement('EntranceTestSubject'));
		$entranceTestSubject->appendChild(new DOMElement(((is_string($this->SubjectName)) ? 'SubjectName' : 'SubjectID'), $this->SubjectName));
		$node->appendChild(new DOMElement('EntranceTestTypeID', $this->EntranceTestTypeID));
		$node->appendChild(new DOMElement('CompetitiveGroupID', $this->CompetitiveGroupID));
		return $node;
	}

}