<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок пакета импортируемых данных.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_PackageData extends FIS_BaseElement {
	
// FUTURE: Реализовать генерацию CampaignInfo
// 	/**
// 	 * @var unknown Информация о приемных компаниях (не обязательное поле, необходима предварительная инициализация).
// 	 */
// 	public $CampaignInfo;
// FUTURE: Реализовать генерацию AdmissionInfo
// 	/**
// 	 * @var unknown Сведения об объеме и структуре приема (не обязательное поле, необходима предварительная инициализация).
// 	 */
// 	public $AdmissionInfo;
// FUTURE: Реализовать генерацию InstitutionAchievements	
// 	/**
// 	 * @var unknown Индивидуальные достижения, учитываемые образовательной организацией.
// 	 */
// 	public $InstitutionAchievements;
	/**
	 * @var FIS_PackageData_Application[] Массив данных заявлений абитуриентов (не обязательное поле, необходима предварительная инициализация каждого элемента массива).
	 */
	public $Applications = array();
	/**
	 * @var FIS_PackageData_OrderOfAdmission[] Массив данных заявлений абитуриентов, включенных в приказ (не обязательное поле, необходима предварительная инициализация каждого элемента массива).
	 */
	public $OrdersOfAdmission = array();
	/**
	 * @var FIS_PackageData_RecommendedList[] Массив данных об абитуриентах, рекомендованных к зачислению (не обязательное поле, необходима предварительная инициализация каждого элемента массива).
	 */
	public $RecommendedLists = array();
	
	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		if (count($this->Applications) > 0) {
			$nodeApp = $node->appendChild(new DOMElement('Applications'));
			foreach ($this->Applications as $app)
				$nodeApp->appendChild($app->GetNode($node->appendChild(new DOMElement('Application'))));
		}
		if (count($this->OrdersOfAdmission) > 0) {
			$nodeApp = $node->appendChild(new DOMElement('OrdersOfAdmission'));
			foreach ($this->OrdersOfAdmission as $app)
				$nodeApp->appendChild($app->GetNode($node->appendChild(new DOMElement('OrderOfAdmission'))));
		}
		if (count($this->RecommendedLists) > 0) {
			$nodeApp = $node->appendChild(new DOMElement('RecommendedLists'));
			foreach ($this->RecommendedLists as $app)
				$nodeApp->appendChild($app->GetNode($node->appendChild(new DOMElement('RecommendedList'))));
		}
		return $node;
	}

}