<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс, представляющий блок авторизации.
 * @package FIS EGE
 * @author Сергей С. Смирнов
 * @copyright 2013-15 Ivanovo State University od Chemistry and Technology
 * @version 2.5.3
 */
class FIS_AuthData extends FIS_BaseElement {

	/**
	 * @var string Номер заявления ОУ (обязательное поле).
	 */
	public $Login;
	/**
	 * @var string Пароль (обязательное поле).
	 */
	public $Pass;
	/**
	 * @var string Идентификатор ВУЗа.
	 */
	public $InstitutionID;
	
	
	/**
	 * Инициализирует экземпляр класса FIS_AuthData.
	 * @param string $login Логин пользователя.
	 * @param string $passw Пароль пользователя.
	 * @param string $instID Идентифкатор ВУЗа.
	 */
	function __construct($login = NULL, $passw = NULL, $instID = NULL) {
		$this->Login = $login;
		$this->Pass = $passw;
		$this->InstitutionID = $instID;
	}
	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public function GetNode($node) {
		$node->appendChild(new DOMElement('Login', $this->Login));
		$node->appendChild(new DOMElement('Pass', $this->Pass));
		if (!empty($this->InstitutionID))
			$node->appendChild(new DOMElement('InstitutionID', $this->InstitutionID));
		return $node;
	}
	
}