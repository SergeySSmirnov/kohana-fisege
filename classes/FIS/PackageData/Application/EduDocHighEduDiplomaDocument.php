<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных о дипломе о высшем профессиональном образовании.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_PackageData_Application_EduDocHighEduDiplomaDocument extends FIS_PackageData_Application_BaseDocument {
	
	/**
	 * @var string Регистрационный номер (не обязательное поле).
	 */
	public $RegistrationNumber;
	/**
	 * @var string Поле зарезервировано. Значение не обрабатывается (не обязательное поле).
	 */
	public $QualificationTypeID;
	/**
	 * @var string Код направления подготовки из справочника №10 (не обязательное поле).
	 */
	public $SpecialityID;
	/**
	 * @var string Поле зарезервировано. Значение не обрабатывается (не обязательное поле).
	 */
	public $SpecializationID;
	/**
	 * @var string Год окончания (не обязательное поле).
	 */
	public $EndYear;
	/**
	 * @var string Средний балл (не обязательное поле).
	 */
	public $GPA;


	/**
	 * Инициализирует экземпляр класса FIS_PackageData_Application_BaseDocument.
	 * @param string $ser Серия документа.
	 * @param string $num Номер документа.
	 * @param DateTime Дата выдачи документа.
	 */
	function __construct($ser = NULL, $num = NULL, $docDate = NULL) {
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
		$node = $node->appendChild(new DOMElement('HighEduDiplomaDocument'));
		$node = parent::GetNode($node);
		if (!empty($this->RegistrationNumber))
			$node->appendChild(new DOMElement('RegistrationNumber', $this->RegistrationNumber));
		if (!empty($this->SpecialityID))
			$node->appendChild(new DOMElement('SpecialityID', $this->SpecialityID));
		if (!empty($this->EndYear))
			$node->appendChild(new DOMElement('EndYear', $this->EndYear));
		if (!empty($this->GPA))
			$node->appendChild(new DOMElement('GPA', $this->GPA));
		return $node;
	}
	
}