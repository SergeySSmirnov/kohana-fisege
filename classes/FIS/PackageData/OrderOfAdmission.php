<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок заявления абитуриента, включенного в приказ.
 *
 * @category Class
 * @author Сергей С. Смирнов
 * @copyright 2010-14 RUSproj, Sergey S. Smirnov
 */
class FIS_PackageData_OrderOfAdmission extends FIS_BaseElement {

	/**
	 * @var string Номер заявления ОУ (обязательное поле).
	 */
	public $ApplicationNumber;
	/**
	 * @var DateTime Дата регистрации заявления (обязательное поле).
	 */
	public $RegistrationDate;
	/**
	 * @var int ИД направления подготовки из справочника №10 (обязательное поле).
	 */
	public $DirectionID;
	/**
	 * @var int ИД формы обучения из справочника №14 (обязательное поле).
	 */
	public $EducationFormID;
	/**
	 * @var int ИД источника финансирования из справочника №15 (обязательное поле).
	 */
	public $FinanceSourceID;
	/**
	 * @var int ИД уровня образования из справочника №2 (обязательное поле).
	 */
	public $EducationLevelID;
	/**
	 * @var int Этап зачисления (возможные значения 1 или 2, не обязательное поле).
	 */
	public $Stage;
	/**
	 * @var bool Признак приказа для льготников (не обязательное поле).
	 */
	public $IsBeneficiary;
	/**
	 * @var bool Признак иностранного гражданина, поступающего по межправительственным оглашениям (не обязательное поле).
	 */
	public $IsForeigner;
	/**
	 * @var string UID конкурсной группы (не обязательное поле).
	 */
	public $CompetitiveGroupUID;
	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_OrderOfAdmission.
	 * @param string $appNumber Номер заявления ОУ.
	 * @param DateTime $regDate Дата регистрации заявления.
	 * @param int $dirID ИД направления подготовки из справочника №10.
	 * @param int $eFormID ИД формы обучения из справочника №14.
	 * @param int $fSrcID ИД источника финансирования из справочника №15.
	 * @param int $edLvlID ИД уровня образования из справочника №2.
	 */
	function __construct($appNumber = NULL, $regDate = NULL, $dirID = NULL, $eFormID = NULL, $fSrcID = NULL, $edLvlID = NULL) {
		$this->ApplicationNumber = $appNumber;
		$this->RegistrationDate = $regDate;
		$this->DirectionID = $dirID;
		$this->EducationFormID = $eFormID;
		$this->FinanceSourceID = $fSrcID;
		$this->EducationLevelID = $edLvlID;
	}
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$app = $node->appendChild(new DOMElement('Application'));
		$app->appendChild(new DOMElement('ApplicationNumber', $this->ApplicationNumber));
		$app->appendChild(new DOMElement('RegistrationDate', $this->RegistrationDate));
		$node->appendChild(new DOMElement('DirectionID', $this->DirectionID));
		$node->appendChild(new DOMElement('EducationFormID', $this->EducationFormID));
		$node->appendChild(new DOMElement('FinanceSourceID', $this->FinanceSourceID));
		$node->appendChild(new DOMElement('EducationLevelID', $this->EducationLevelID));
		if (!empty($this->Stage))
			$node->appendChild(new DOMElement('Stage', $this->Stage));
		if ($this->IsBeneficiary)
			$node->appendChild(new DOMElement('IsBeneficiary', 'true'));
		if ($this->IsForeigner)
			$node->appendChild(new DOMElement('IsForeigner', 'true'));
		if (!empty($this->CompetitiveGroupUID))
			$node->appendChild(new DOMElement('CompetitiveGroupUID', $this->CompetitiveGroupUID));
		return $node;
	}

}