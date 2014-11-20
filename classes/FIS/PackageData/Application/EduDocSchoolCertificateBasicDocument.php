<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об аттестате об основном общем образовании.
 *
 * @category Class
 * @author Сергей С. Смирнов
 * @copyright 2010-14 RUSproj, Sergey S. Smirnov
 */
class FIS_PackageData_Application_EduDocSchoolCertificateBasicDocument extends FIS_PackageData_Application_BaseDocument {

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
		$node = $node->appendChild(new DOMElement('SchoolCertificateBasicDocument'));
		$node = parent::GetNode($node);
		if (!empty($this->EndYear))
			$node->appendChild(new DOMElement('EndYear', $this->EndYear));
		if (!empty($this->GPA))
			$node->appendChild(new DOMElement('GPA', $this->GPA));
		return $node;
	}
	
}