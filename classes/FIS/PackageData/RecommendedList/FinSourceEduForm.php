<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об условиях приема по текущей реализации.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_PackageData_RecommendedList_FinSourceEduForm extends FIS_BaseElement {

	/**
	 * @var int ИД уровня образования по справочнчику №2 (обязательное поле).
	 */
	public $EducationalLevelID;
	/**
	 * @var int ИД формы обучения по справочнику №14 (обязательное поле).
	 */
	public $EducationFormID;
	/**
	 * @var string UID конкурсной группы (обязательное поле).
	 */
	public $CompetitiveGroupID;
	/**
	 * @var int ИД направления подготовки по справочнику №10 (обязательное поле).
	 */
	public $DirectionID;
	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_RecommendedList_FinSourceEduForm.
	 * @param int $edLvlID ИД уровня образования по справочнику №2.
	 * @param int $edFrmID ИД формы обучения по справочнику №14.
	 * @param string $compGrpID UID конкурсной группы.
	 * @param int $dirctnID ИД направления подготовки по справочнику №10.
	 */
	function __construct($edLvlID = NULL, $edFrmID = NULL, $compGrpID = NULL, $dirctnID = NULL) {
		$this->EducationalLevelID = $edLvlID;
		$this->EducationFormID = $edFrmID;
		$this->CompetitiveGroupID = $compGrpID;
		$this->DirectionID = $dirctnID;
	}
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node->appendChild(new DOMElement('EducationalLevelID', $this->EducationalLevelID));
		$node->appendChild(new DOMElement('EducationFormID', $this->EducationFormID));
		$node->appendChild(new DOMElement('CompetitiveGroupID', $this->CompetitiveGroupID));
		$node->appendChild(new DOMElement('DirectionID', $this->DirectionID));
		return $node;
	}

}