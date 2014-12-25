<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс является базовым элементом для описания и формирования структуры XML документа, который необходимо выгрузить в "ФИС ЕГЭ и прием". 
 *
 * @category Class
 * @author Сергей С. Смирнов
 * @copyright 2013-14 Ivanovo State University od Chemistry and Technology
 */
class FIS extends FIS_BaseElement {
	
	/**
	 * Возвращает массив значений соответствующего справочника, прочитанный из XML файла.
	 * @param int $dictNumber Номер справочника, из которого необходимо прочитать значения.
	 * @param string $key Имя XML тега, который будет соответствовать ключу возвращаемого массива (по умолчанию - "ID").
	 * @param string $val Имя XML тега, который будет соответствовать значению возвращаемого массива (по умолчанию - "Name").
	 * @return Массив значений справочника.
	 */
	public static function GetDictVal($dictNumber, $key = 'ID', $val = 'Name') {
		$fName = 'import_export/xml/fis/'.(($dictNumber <= 9) ? "0" : "").$dictNumber.'_dict.xml';
		if (!file_exists($fName))
			return array();
		$res = array();
		foreach (simplexml_load_file($fName)->DictionaryItems->DictionaryItem as $rec)
			$res[(string)$rec->{$key}] = (string)$rec->{$val};
		return $res;
	}
	
	/**
	 * Возвращает уникальное имя для конкурсной группы.
	 * @param string $year Год поступления в аспирантуру.
	 * @param string $eduLvl ИД уровня образования по справочнику №2.
	 * @return string Уникальное имя для конкурсной группы.
	 */
	public static function GetCompetitiveGroupUID($year, $eduLvl) {
		return 'ISUCT_'.$year.'_EDULVL_'.$eduLvl;
	}
	/**
	 * Возвращает уникальное имя для элемента конкурсной группы.
	 * @param string $year Год поступления в аспирантуру.
	 * @param string $eduLvl ИД уровня образования по справочнику №2.
	 * @param string $napShifr Шифр направления подготовки.
	 * @return string Уникальное имя для конкурсной группы.
	 */
	public static function GetCompetitiveGroupItemUID($year, $eduLvl, $napShifr) {
		return 'ISUCT_'.$year.'_EDULVL_'.$eduLvl.'_NAP_'.$napShifr;
	}
	/**
	 * Возвращает уникальное имя для заявления персоны, поступающей в аспирантуру.
	 * @param string $year Год поступления в аспирантуру.
	 * @param string $eduLvl ИД уровня образования по справочнику №2.
	 * @param int $aprID ИД поступающего из базы данных.
	 * @return string Уникальное имя для заявления персоны.
	 */
	public static function GetApplicationNumber($year, $eduLvl, $aprID) {
		return 'ISUCT_'.$year.'_EDULVL_'.$eduLvl.'_APER_'.$aprID;
	}
	/**
	 * Возвращает уникальное имя для заявления.
	 * @param string $year Год поступления в аспирантуру.
	 * @param string $eduLvl ИД уровня образования по справочнику №2.
	 * @param int $aprID ИД поступающего из базы данных.
	 * @return string Уникальное имя для заявления персоны.
	 */
	public static function GetApplicationUID($year, $eduLvl, $aprID) {
		return 'ISUCT_'.$year.'_EDULVL_'.$eduLvl.'_APP_'.$aprID;
	}
	/**
	 * Возвращает уникальное имя для персоны, поступающей в аспирантуру.
	 * @param string $year Год поступления в аспирантуру.
	 * @param string $eduLvl ИД уровня образования по справочнику №2.
	 * @param int $perID ИД поступающего из базы данных.
	 * @return string Уникальное имя для заявления персоны.
	 */
	public static function GetAPersonUID($year, $eduLvl, $perID) {
		return 'ISUCT_'.$year.'_EDULVL_'.$eduLvl.'_PER_'.$perID;
	}
	/**
	 * Возвращает уникальное имя для персоны.
	 * @param int $aprID ИД поступающего в базе данных.
	 * @return string Уникальное имя для заявления персоны.
	 */
	public static function GetPerUID($aprID) {
		return 'PER_'.$aprID;
	}
	/**
	 * Возвращает уникальное имя для вступительного экзамена в аспирантуру.
	 * @param string $year Год поступления в аспирантуру.
	 * @param string $eduLvl ИД уровня образования по справочнику №2.
	 * @param string $subjID ИД предмета, по которому состоялся экзамен.
	 * @param int $perID ИД поступающего из базы данных.
	 * @return string Уникальное имя для записи вступительного экзамена.
	 */
	public static function GetETestUID($year, $eduLvl, $subjID, $perID) {
		return 'ISUCT_'.$year.'_EDULVL_'.$eduLvl.'_SUBJ_'.$subjID.'_APER_'.$perID;
	}
	
	
	
	/**
	 * @var FIS_AuthData Блок авторизации (обязательное поле, инициализируется автоматически).
	 */
	public $AuthData;
	/**
	 * @var FIS_PackageData Пакет с импортируемыми данными (обязательное поле, инициализируется автоматически).
	 */
	public $PackageData;
	
	
	/**
	 * Инициализирует экземпляр класса FIS.
	 */
	function __construct() {
		$this->AuthData = new FIS_AuthData();
		$this->PackageData = new FIS_PackageData();
	}

	
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node->appendChild($this->AuthData->GetNode($node->appendChild(new DOMElement('AuthData'))));
		$node->appendChild($this->PackageData->GetNode($node->appendChild(new DOMElement('PackageData'))));
		return $node;
	}
	/**
	 * Возвращает DOMDocument с заполненными данными.
	 * @return DOMDocument Документ с данными.
	 */
	public function GetXML() {
		$dom = new DOMDocument('1.0', 'utf8');
		$root = $dom->appendChild(new DOMElement('Root'));
		$dom->appendChild($this->GetNode($root));
		return $dom;
	}
	
}