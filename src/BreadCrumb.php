<?php


/**
 * Class BreadCrumbControl
 *
 * Breadcrumb Component
 * @author David Zadražil <me@davidzadrazil.cz>
 */
class BreadCrumbControl extends Nette\Application\UI\Control
{


	/** @var array links */
	public $links = array();



	/**
	 * Render function
	 */
	public function render()
	{
		$this->template->setFile(__DIR__ . '/BreadCrumb.latte');
		$this->template->links = $this->links;
		$this->template->render();
	}



	/**
	 * Add link
	 *
	 * @param $title
	 * @param Nette\Application\UI\Link $link
	 * @param null $icon
	 */
	public function addLink($title, $link = NULL, $icon = NULL)
	{
		$this->links[] = array(
			'title' => $title,
			'link'  => $link,
			'icon'  => $icon
		);
	}



	/**
	 * Remove link
	 *
	 * @param $key
	 *
	 * @throws Exception
	 */
	public function removeLink($key)
	{
		if (is_int($key)) {
			unset($this->links[$key]);
		} else {
			throw new Exception("Key must be int.");
		}
	}
}


