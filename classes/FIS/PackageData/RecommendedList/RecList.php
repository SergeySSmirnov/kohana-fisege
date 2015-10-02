<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об элементе списка лиц, рекомендованных к зачислению.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_PackageData_RecommendedList_RecList extends FIS_BaseElement {

	/**
	 * @var string Номер заявления (обязательное поле).
	 */
	public $ApplicationNumber;
	/**
	 * @var DateTime Дата регистрации заявления (обязательное поле).
	 */
	public $RegistrationDate;
	/**
	 * @var FIS_PackageData_RecommendedList_FinSourceEduForm[] Список форм обучения и источников финансирования, по которым заявление включается в список рекомендованных по условияем приёма по текущей реализации (обязательное поле или $FinSourceAndEduForms, необходима предварительная инициализация каждого элемента массива).
	 */
	public $FinSourceEduForms = array();
	/**
	 * @var FIS_PackageData_RecommendedList_FinSourceAndEduForm[] Список форм обучения и источников финансирования, по которым заявление включается в список рекомендованных по условиям приёма по спецификации (обязательное поле или $FinSourceEduForms, необходима предварительная инициализация каждого элемента массива).
	 */
	public $FinSourceAndEduForms = array();
	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_RecommendedList_RecList.
	 * @param string $appNumber Номер заявления (обязательное поле).
	 * @param DateTime $regDate Дата регистрации заявления (обязательное поле).
	 * @param FIS_PackageData_RecommendedList_FinSourceEduForm[] $finSrc Список форм обучения и источников финансирования, по которым заявление включается в список рекомендованных по условияем приёма по текущей реализации (обязательное поле или $finAndSrc, необходима предварительная инициализация каждого элемента массива).
	 * @param FIS_PackageData_RecommendedList_FinSourceAndEduForm[] $finAndSrc Список форм обучения и источников финансирования, по которым заявление включается в список рекомендованных по условиям приёма по спецификации (обязательное поле или $finSrc, необходима предварительная инициализация каждого элемента массива).
	 */
	function __construct($appNumber, $regDate, $finSrc = array(), $finAndSrc = array()) {
		$this->ApplicationNumber = $appNumber;
		$this->RegistrationDate = $regDate;
		$this->FinSourceEduForms = $finSrc;
		$this->FinSourceAndEduForms = $finAndSrc;
	}

	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$_appNode = $node->appendChild(new DOMElement('Application'));
		$_appNode->appendChild(new DOMElement('ApplicationNumber', $this->ApplicationNumber));
		$_appNode->appendChild(new DOMElement('RegistrationDate', $this->RegistrationDate));
		if (count($this->FinSourceEduForms) > 0) {
			$_frmsNode = $node->appendChild(new DOMElement('FinSourceAndEduForms'));
			foreach ($this->FinSourceEduForms as $_form) {
				$_frmsNode->appendChild($_form->GetNode($node->appendChild(new DOMElement('FinSourceEduForm'))));
			}
		} elseif (count($this->FinSourceAndEduForms) > 0) {
			$_frmsNode = $node->appendChild(new DOMElement('FinSourceAndEduForms'));
			foreach ($this->FinSourceAndEduForms as $_form) {
				$_frmsNode->appendChild($_form->GetNode($node->appendChild(new DOMElement('FinSourceAndEduForm'))));
			}
		}
		return $node;
	}

}