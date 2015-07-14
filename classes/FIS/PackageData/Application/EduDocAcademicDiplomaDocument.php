<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об академической справке.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 */
class FIS_PackageData_Application_EduDocAcademicDiplomaDocument extends FIS_PackageData_Application_BaseDocument {

	/**
	 * @var string Регистрационный номер (не обязательное поле).
	 */
	public $RegistrationNumber;
	/**
	 * @var string Квалификация (текст, не обязательное поле).
	 */
	public $QualificationTypeID;
	/**
	 * @var string Специальность (текст, не обязательное поле).
	 */
	public $SpecialityID;
	/**
	 * @var string Специализация (текст, не обязательное поле).
	 */
	public $SpecializationID;
	
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node = $node->appendChild(new DOMElement('AcademicDiplomaDocument'));
		$node = parent::GetNode($node);
		if (!empty($this->RegistrationNumber))
			$node->appendChild(new DOMElement('RegistrationNumber', $this->RegistrationNumber));
		if (!empty($this->QualificationTypeID))
			$node->appendChild(new DOMElement('QualificationTypeID', $this->QualificationTypeID));
		if (!empty($this->SpecialityID))
			$node->appendChild(new DOMElement('SpecialityID', $this->SpecialityID));
		if (!empty($this->SpecializationID))
			$node->appendChild(new DOMElement('SpecializationID', $this->SpecializationID));
		if (!empty($this->EndYear))
			$node->appendChild(new DOMElement('EndYear', $this->EndYear));
		if (!empty($this->GPA))
			$node->appendChild(new DOMElement('GPA', $this->GPA));
		return $node;
	}
	
}