<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок заявления от абитуриента.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 */
class FIS_PackageData_Application extends FIS_BaseElement {

	/**
	 * @var string Идентификатор в ИС ОО (обязательное поле).
	 */
	public $UID;
	/**
	 * @var string Номер заявления ОО (обязательное поле).
	 */
	public $ApplicationNumber;
	/**
	 * @var FIS_PackageData_Application_Entrant Абитуриент (обязательное поле, инициализируется автоматически).
	 */
	public $Entrant;
	/**
	 * @var DateTime Дата регистрации заявления (обязательное поле).
	 */
	public $RegistrationDate;
	/**
	 * @var DateTime Дата отзыва заявлления (не обязательное поле).
	 */
	public $LasDenyDate;
	/**
	 * @var bool Признак необходимости общежития (обязательное поле).
	 */
	public $NeedHostel;
	/**
	 * @var int Статус заявления по справочнику №4 (обязательное поле).
	 */
	public $StatusID;
	/**
	 * @var string Комментарий к статусу заявления (не обязательное поле).
	 */
	public $StatusComment;
	/**
	 * @var string Приоритет заявления. Заполняется в случае нескольких заявлений от одного абитуриента (не обязательное поле).
	 */
	public $Priority;
	/**
	 * @var array Массив идентификаторов конкурсных групп до зачисления (обязательное поле).
	 */
	public $SelectedCompetitiveGroups = array();
	/**
	 * @var array Массив идентификаторов элементов конкурсных групп до зачисления (обязательное поле).
	 */
	public $SelectedCompetitiveGroupItems = array();
	/**
	 * @var FIS_PackageData_Application_FinSourceEduForm[] Формы обучения и источники финансирования, выбранные абитуриентом (обязательное поле).
	 */
	public $FinSourceAndEduForms = array();
// FUTURE: Реализовать генерацию ApplicationCommonBenefit
// 	/**
// 	 * @var Unknown[] Общая льгота, представленная абитуриенту (не обязательное поле).
// 	 */
// 	public $ApplicationCommonBenefit;
// FUTURE: Реализовать генерацию ApplicationCommonBenefits
// 	/**
// 	 * @var Unknown[] Массив данных об общих льготах, представленных абитуриенту (не обязательное поле).
// 	 */
// 	public $ApplicationCommonBenefits = array();
	/**
	 * @var FIS_PackageData_Application_EntranceTestResult[] Массив данных о результатах вступительных испытаний (не обязательное поле, требует инициализации).
	 */
	public $EntranceTestResults = array();
	/**
	 * @var FIS_PackageData_Application_ApplicationDocuments Документы, приложенные к заявлению (обязательное поле, инициализируется автоматически).
	 */
	public $ApplicationDocuments;

// FUTURE: Реализовать генерацию IndividualAchievements
// 	/**
// 	 * @var Unknown[] Массив данных об индивидуальных достижениях поступающего (не обязательное поле).
// 	 */
// 	public $IndividualAchievements = array();
	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_Application.
	 */
	function __construct() {
		$this->Entrant = new FIS_PackageData_Application_Entrant();
		$this->ApplicationDocuments = new FIS_PackageData_Application_ApplicationDocuments();
	}

	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node->appendChild(new DOMElement('UID', $this->UID));
		$node->appendChild(new DOMElement('ApplicationNumber', $this->ApplicationNumber));
		$node->appendChild($this->Entrant->GetNode($node->appendChild(new DOMElement('Entrant'))));
		$node->appendChild(new DOMElement('RegistrationDate', $this->RegistrationDate));
		if (!is_null($this->LasDenyDate))
			$node->appendChild(new DOMElement('LasDenyDate', $this->LasDenyDate));
		$node->appendChild(new DOMElement('NeedHostel', (($this->NeedHostel === TRUE) ? 'true' : 'false')));
		$node->appendChild(new DOMElement('StatusID', $this->StatusID));
		if (!empty($this->StatusComment))
			$node->appendChild(new DOMElement('StatusComment', $this->StatusComment));
		if (count($this->SelectedCompetitiveGroups) > 0) {
			$nodeApp = $node->appendChild($node->appendChild(new DOMElement('SelectedCompetitiveGroups')));
			foreach ($this->SelectedCompetitiveGroups as $record)
				$nodeApp->appendChild(new DOMElement('CompetitiveGroupID', $record));
		}
		if (count($this->SelectedCompetitiveGroupItems) > 0) {
			$nodeApp = $node->appendChild($node->appendChild(new DOMElement('SelectedCompetitiveGroupItems')));
			foreach ($this->SelectedCompetitiveGroupItems as $record)
				$nodeApp->appendChild(new DOMElement('CompetitiveGroupItemID', $record));
		}
		$nodeApp = $node->appendChild($node->appendChild(new DOMElement('FinSourceAndEduForms')));
		foreach ($this->FinSourceAndEduForms as $record)
			$nodeApp->appendChild($record->GetNode($node->appendChild(new DOMElement('FinSourceEduForm'))));
		if (count($this->EntranceTestResults) > 0) {
			$nodeApp = $node->appendChild($node->appendChild(new DOMElement('EntranceTestResults')));
			foreach ($this->EntranceTestResults as $record)
				$nodeApp->appendChild($record->GetNode($node->appendChild(new DOMElement('EntranceTestResult'))));
		}
		$node->appendChild($this->ApplicationDocuments->GetNode($node->appendChild(new DOMElement('ApplicationDocuments'))));
		if (!empty($this->Priority))
			$node->appendChild(new DOMElement('Priority', $this->Priority));
		return $node;
	}

}