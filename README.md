Nette Breadcrumb Component For Bootstrap 3
===========================================

Simple [Nette](http://nette.org) component creating Breadcrumb navigation based on [Twitter Bootstrap 3](http://getbootstrap.com/).


Installation
------------
The best way to install this component is throught [Composer](http://getcomposer.org/).

```sh
$ composer require davidzadrazil/nette-breadcrumb-bootstrap:@dev-master
```

Or simply [download](https://github.com/DavidZadrazil/nette-breadcrumb-bootstrap/archive/master.zip) this package and place it into your vendor (libs) directory.


Using
-----
Create component in your presenter (idelly in BasePresenter) and add link to the main page -

```php
protected function createComponentBreadCrumb()
{
	$breadCrumb = new BreadCrumbControl();
	$breadCrumb->addLink('Main page', $this->link('Homepage:'), 'icon-homepage');

	return $breadCrumb;
}
```

And in another presenter, when we want to add another link -

```php
$this['breadCrumb']->addLink('Sub page')
```
