<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных о дипломе о начальном профессиональном образовании.
 *
 * @category Class
 * @author Сергей С. Смирнов
 * @copyright 2010-14 RUSproj, Sergey S. Smirnov
 */
class FIS_PackageData_Application_EduDocBasicDiplomaDocument extends FIS_PackageData_Application_BaseDocument {

	/**
	 * @var string Регистрационный номер (не обязательное поле).
	 */
	public $RegistrationNumber;
	/**
	 * @var string Квалификация (текст, не обязательное поле).
	 */
	public $QualificationTypeID;
	/**
	 * @var string Профессия (текст, не обязательное поле).
	 */
	public $ProfessionID;
	/**
	 * @var string Год окончания (не обязательное поле).
	 */
	public $EndYear;
	/**
	 * @var string Средний балл (не обязательное поле).
	 */
	public $GPA;
	
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node = $node->appendChild(new DOMElement('BasicDiplomaDocument'));
		$node = parent::GetNode($node);
		if (!empty($this->RegistrationNumber))
			$node->appendChild(new DOMElement('RegistrationNumber', $this->RegistrationNumber));
		if (!empty($this->QualificationTypeID))
			$node->appendChild(new DOMElement('QualificationTypeID', $this->QualificationTypeID));
		if (!empty($this->ProfessionID))
			$node->appendChild(new DOMElement('ProfessionID', $this->ProfessionID));
		if (!empty($this->EndYear))
			$node->appendChild(new DOMElement('EndYear', $this->EndYear));
		if (!empty($this->GPA))
			$node->appendChild(new DOMElement('GPA', $this->GPA));
		return $node;
	}
	
}