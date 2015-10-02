<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных об абитуриенте, рекомендованному к зачислению.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_PackageData_RecommendedList extends FIS_BaseElement {

	/**
	 * @var int Этап зачисления (возможные значения 1 или 2, обязательное поле).
	 */
	public $Stage;
	/**
	 * @var FIS_PackageData_RecommendedList_RecList[] Элементы списка лиц, рекомендованных к зачислению (обязательное поле, необходима предварительная инициализация каждого элемента массива).
	 */
	public $RecLists = array();
	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_RecommendedList.
	 * @param int $stage Этап зачисления (возможные значения 1 или 2, обязательное поле).
	 * @param FIS_PackageData_RecommendedList_RecList[] $recLists Элементы списка лиц, рекомендованных к зачислению (обязательное поле, необходима предварительная инициализация каждого элемента массива).
	 */
	function __construct($stage, $recLists) {
		$this->Stage = $stage;
		$this->RecLists = $recLists;
	}

	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node->appendChild(new DOMElement('Stage', $this->Stage));
		$_recListsNode = $node->appendChild(new DOMElement('RecLists'));
		if (count($this->RecLists) > 0) {
			foreach ($this->RecLists as $_rec)
				$_recListsNode->appendChild($_rec->GetNode($node->appendChild(new DOMElement('RecList'))));
		}
		return $node;
	}

}