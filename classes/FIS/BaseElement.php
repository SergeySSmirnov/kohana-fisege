<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Базовый класс модели, представляющий описание простого узла дерева XML.
 *
 * @category Class
 * @author Сергей С. Смирнов
 * @copyright 2010-14 RUSproj, Sergey S. Smirnov
 */
abstract class FIS_BaseElement {

	/**
	 * Возвращает DOMNode, сформированный в соответствии с XML схемой, и содержащие текущие данные класса.
	 * @param DOMNode $node Узел, который необходимо заполнить данными.
	 * @return DOMNode Узел XML, содержащий соответствующие данные.
	 */
	public abstract function GetNode($node);

}