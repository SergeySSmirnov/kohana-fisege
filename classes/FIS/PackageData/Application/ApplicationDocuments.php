<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок данных о документах, приложенных к заявлению.
 *
 * @category Class
 * @author Сергей С. Смирнов
 * @copyright 2010-14 RUSproj, Sergey S. Smirnov
 */
class FIS_PackageData_Application_ApplicationDocuments extends FIS_BaseElement {

// FUTURE: Реализовать генерацию EgeDocument
// 	/**
// 	 * @var Unknown Свидетельство о результатах ЕГЭ (не обязательное поле, требует инициализации).
// 	 */
// 	public $EgeDocument;
// FUTURE: Реализовать генерацию GiaDocuments
// 	/**
// 	 * @var Unknown Справки ГИА (не обязательное поле, требует инициализации).
// 	 */
// 	public $GiaDocuments;
	/**
	 * @var FIS_PackageData_Application_IdentityDocument Документ, удостоверяющий личность (обязательное поле, инициализируется автоматически).
	 */
	public $IdentityDocument;
	/**
	 * @var FIS_PackageData_Application_BaseDocument[] Массив данных о документах об образовании (не обязательное поле).
	 */
	public $EduDocuments = array();
// FUTURE: Реализовать генерацию MilitaryCardDocument
// 	/**
// 	 * @var Unknown Военный билет (не обязательное поле, требует инициализации).
// 	 */
// 	public $MilitaryCardDocument;
	/**
	 * @var FIS_PackageData_Application_StudentDocument Справка об обучении в другом ВУЗе (не обязательное поле, требует инициализации).
	 */
	public $StudentDocument;
	/**
	 * @var FIS_PackageData_Application_CustomDocument[] Массив данных об иных документах (не обязательное поле).
	 */
	public $CustomDocuments = array();
	
	
	/**
	 * Инициализирует экземпляр класса FIS_PackageData_Application_ApplicationDocuments.
	 */
	function __construct() {
		$this->IdentityDocument = new FIS_PackageData_Application_IdentityDocument();
	}

	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node->appendChild($this->IdentityDocument->GetNode($node->appendChild(new DOMElement('IdentityDocument'))));
		if (count($this->EduDocuments) > 0) {
			$nodeApp = $node->appendChild($node->appendChild(new DOMElement('EduDocuments')));
			foreach ($this->EduDocuments as $record) {
				$dnode = $nodeApp->appendChild(new DOMElement('EduDocument'));
				$dnode->appendChild($record->GetNode($dnode));
			}
		}
		if (!is_null($this->StudentDocument))
			$node->appendChild($this->StudentDocument->GetNode($node->appendChild(new DOMElement('StudentDocument'))));
		if (count($this->CustomDocuments) > 0) {
			$nodeApp = $node->appendChild($node->appendChild(new DOMElement('CustomDocuments')));
			foreach ($this->CustomDocuments as $record)
				$nodeApp->appendChild($record->GetNode($node->appendChild(new DOMElement('CustomDocument'))));
		}
		return $node;
	}

}