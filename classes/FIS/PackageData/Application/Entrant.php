<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об абитуриенте.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_PackageData_Application_Entrant extends FIS_BaseElement {

	/**
	 * @var string Идентификатор в ИС ОУ (обязательное поле).
	 */
	public $UID;
	/**
	 * @var string Имя (обязательное поле).
	 */
	public $FirstName;
	/**
	 * @var string Отчество (не обязательное поле).
	 */
	public $MiddleName;
	/**
	 * @var string Фамилия (обязательное поле).
	 */
	public $LastName;
	/**
	 * @var string Пол по справочнику №5 (обязательное поле, возможные значения: 1 - мужской; 2 - женский).
	 */
	public $GenderID;
	/**
	 * @var string Дополнительные сведения, предоставляемые абитуриентом (не обязательное поле).
	 */
	public $CustomInformation;
	/**
	 * @var string СНИЛС (не обязательное поле).
	 */
	public $Snils;
	
	
	/**
	 * Инииализирует экземпляр класса FIS_PackageData_Application_Entrant.
	 * @param string $uid Идентификатор в ИС ОУ.
	 * @param string $fName Имя.
	 * @param string $mName Отчество.
	 * @param string $lName Фамилия.
	 * @param string $gender Пол по справочнику №5.
	 */
	function __construct($uid = NULL, $fName = NULL, $mName = NULL, $lName = NULL, $gender = NULL) {
		$this->UID = $uid;
		$this->FirstName = $fName;
		$this->MiddleName = $mName;
		$this->LastName = $lName;
		$this->GenderID = $gender;
	}
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node->appendChild(new DOMElement('UID', $this->UID));
		$node->appendChild(new DOMElement('FirstName', $this->FirstName));
		if (!empty($this->MiddleName))
			$node->appendChild(new DOMElement('MiddleName', $this->MiddleName));
		$node->appendChild(new DOMElement('LastName', $this->LastName));
		$node->appendChild(new DOMElement('GenderID', $this->GenderID));
		if (!empty($this->CustomInformation))
			$node->appendChild(new DOMElement('CustomInformation', $this->CustomInformation));
		if (!empty($this->Snils))
			$node->appendChild(new DOMElement('Snils', $this->Snils));
		return $node;
	}

}