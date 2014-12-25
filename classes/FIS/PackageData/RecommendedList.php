<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об абитуриенте, рекомендованному к зачислению.
 *
 * @category Class
 * @author Сергей С. Смирнов
 * @copyright 2013-14 Ivanovo State University od Chemistry and Technology
 */
class FIS_PackageData_RecommendedList extends FIS_BaseElement {

	/**
	 * @var int Этап зачисления (возможные значения 1 или 2, обязательное поле).
	 */
	public $Stage;
	/**
	 * @var string Номер заявления (обязательное поле).
	 */
	public $ApplicationNumber;
	/**
	 * @var DateTime Дата регистрации заявления (обязательное поле).
	 */
	public $RegistrationDate;
	/**
	 * @var FIS_PackageData_RecommendedList_FinSourceAndEduForm[] Массив с данными об условиях приема, по которым рекомендовано заявление (обязательное поле, необходима предварительная инициализация каждого элемента массива).
	 */
	public $FinSourceAndEduForms = array();
	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_RecommendedList.
	 * @param int $stage Этап зачисления (возможные значения 1 или 2, обязательное поле).
	 * @param string $appNumber Номер заявления (обязательное поле).
	 * @param DateTime $regDate Дата регистрации заявления (обязательное поле).
	 * @param FIS_PackageData_RecommendedList_FinSourceAndEduForm[] $finSrc Массив с данными об условиях приема, по которым рекомендовано заявление (обязательное поле, необходима предварительная инициализация каждого элемента массива).
	 */
	function __construct($stage = NULL, $appNumber = NULL, $regDate = NULL, $finSrc = array()) {
		$this->Stage = $stage;
		$this->ApplicationNumber = $appNumber;
		$this->RegistrationDate = $regDate;
		$this->FinSourceAndEduForms = $finSrc;
	}

	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node->appendChild(new DOMElement('Stage', $this->Stage));
		$recList = $node->appendChild(new DOMElement('RecLists'))->appendChild(new DOMElement('RecList'));
		$application = $recList->appendChild(new DOMElement('Application'));
		$application->appendChild(new DOMElement('ApplicationNumber', $this->ApplicationNumber));
		$application->appendChild(new DOMElement('RegistrationDate', $this->RegistrationDate));
		if (count($this->FinSourceAndEduForms) > 0) {
			$nodeApp = $recList->appendChild(new DOMElement('FinSourceAndEduForms'));
			foreach ($this->FinSourceAndEduForms as $app)
				$nodeApp->appendChild($app->GetNode($node->appendChild(new DOMElement('FinSourceAndEduForm'))));
		}
		return $node;
	}

}