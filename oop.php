<?php
/**
 * Класс для тестового задания
 * 
 * Получает данные из бд, позволяет получить или задать свойства класса.
 *
 * @final
 * @author Immellstorn <immellstorn7@mail.ru>
 * @version 1.0
 */
final class Item
{	
	/**
	 * @var integer $id Идентификатор предмета
	 */
	private $id;
	/**
	 * @var string $name Имя предмета
	 */
	private $name;
	/**
	 * @var integer $status Статус предмета
	 */
	private $status;
	/**
	 * @var boolean $changed Свойство, которое отвечает за состояние имени и статуса. При изменении изначального состояния принимает значение true.
	 */
	private $changed = false;

	/**
	 * Конструктор класса
	 *
	 * Конструктор класса, принимает значение идентификатора.
	 * Вызывает метод init()
	 * 
	 * @param integer $id
	 */
	function __construct($id)
	{
		$this->id = $id;
		$this->init();
	}

	/**
	 * Получение данных из бд
	 *
	 * Получает данные из бд, из таблицы objects.
	 * Поля name и status, соответствующие заданному id.
	 * Передаёт значение полей в соответствующие свойства класса.
	 */
	private function init()
	{
		# Получаем из таблицы objects данные $name и $status
		$this->name = "Имя";
		$this->status = "1234";
	}

	/**
	 * getter
	 *
	 * Описывает поведение get-функции, для приватных свойств класса.
	 * 
	 * @return integer Возвращает значение свойства id класса
	 * @return string Возвращает значение свойства name класса
	 * @return integer Возвращает значение свойства status класса
	 * @return boolean Возвращает значение свойства changed класса
	 */
	public function __get($property) {
		switch ($property) {
			case "id":
				return $this->id;
				break;
			case "name":
				return $this->name;
				break;
			case "status":
				return $this->status;
				break;
			case "changed":
				return $this->changed;
				break;
		}
	}

	/**
	 * setter
	 *
	 * Описывает поведение set-функции, для свойств name и status.
	 * Проверяет тип значения и заполненность в случае изменения.
	 * В случае выполнения всех условий, меняет значение свойства changed на true.
	 */
	public function __set($property, $value) {
			if (($property == "name") && (is_string($value)) && (isset($value))) {
			$this->name = $value;
			$this->changed = true;
		} elseif (($property == "status") && (is_int($value)) && (isset($value))) {
			$this->status = $value;
			$this->changed = true;
		}
	}

	/**
	 * Функция сохранения
	 *
	 * При условии изменения свойств класса вне оного, сохраняет в бд изменённые свойства(name и status).
	 */
	public function save()
	{
		if ($this->changed) {
			#сохраняем в БД новые значения.
			echo "saved";
		}
	}
}

?>