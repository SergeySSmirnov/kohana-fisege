<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об условии приема.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 */
class FIS_PackageData_Application_FinSourceEduForm extends FIS_BaseElement {

	/**
	 * @var string ИД источника финансирования по справочнику №15 (обязательное поле).
	 */
	public $FinanceSourceID;
	/**
	 * @var string ИД формы обучения по справочнику №14 (обязательное поле).
	 */
	public $EducationFormID;
	/**
	 * @var string UID организации целевого приема (не обязательное поле).
	 */
	public $TargetOrganisationUID;
	/**
	 * @var string Приоритет для данной комбинации источника финансирования, формы обучения, конкурсной группы и направления (не обязательное поле).
	 */
	public $Priority;
	/**
	 * @var string UID конкурсной группы (не обязательное поле).
	 */
	public $CompetitiveGroupID;
	/**
	 * @var string UID элемента конкурсной группы (не обязательное поле).
	 */
	public $CompetitiveGroupItemID;

	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_Application_FinSourceEduForm.
	 * @param string $fSourceID ИД источника финансирования по справочнику №15.
	 * @param string $eFormID ИД формы обучения по справочнику №14.
	 */
	function __construct($fSourceID = NULL, $eFormID = NULL) {
		$this->FinanceSourceID = $fSourceID;
		$this->EducationFormID = $eFormID;
	}
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node->appendChild(new DOMElement('FinanceSourceID', $this->FinanceSourceID));
		$node->appendChild(new DOMElement('EducationFormID', $this->EducationFormID));
		if (!empty($this->TargetOrganisationUID))
			$node->appendChild(new DOMElement('TargetOrganisationUID', $this->TargetOrganisationUID));
		if (!empty($this->CompetitiveGroupID))
			$node->appendChild(new DOMElement('CompetitiveGroupID', $this->CompetitiveGroupID));
		if (!empty($this->CompetitiveGroupItemID))
			$node->appendChild(new DOMElement('CompetitiveGroupItemID', $this->CompetitiveGroupItemID));
		if (!empty($this->Priority))
			$node->appendChild(new DOMElement('Priority', $this->Priority));
		return $node;
	}

}