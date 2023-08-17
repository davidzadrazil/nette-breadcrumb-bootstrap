Nette Breadcrumb forked from [DavidZadrazil/nette-breadcrumb-bootstrap](https://github.com/DavidZadrazil/nette-breadcrumb-bootstrap)
===========================================

Simple [Nette](http://nette.org) component creating Breadcrumb navigation.


Installation
------------
The best way to install this component is throught [Composer](http://getcomposer.org/).

```sh
$ composer require alnux/nette-breadcrumb:dev-master
```

Or simply [download](https://github.com/alnux/nette-breadcrumb/archive/master.zip) this package and place it into your vendor directory.


Using
-----
Create component in your presenter (idelly in BasePresenter) and add link to the main page -

```php
protected function createComponentBreadCrumb()
{
	$breadCrumb = new \Alnux\NetteBreadCrumb\BreadCrumb();
	$breadCrumb->addLink('Main page', $this->link('Homepage:'), 'icon-homepage');

	return $breadCrumb;
}
```

In another presenter, when we want to add another link -

```php
$this['breadCrumb']->addLink('Sub page')
```
to edit this link on any presenter's action you could use the next

```php
$this['breadCrumb']->editLink('Sub page', $this->link('User:'), fa fa-dashboard)
```

and to remove
```php
$this['breadCrumb']->removeLink('Sub page')
```


Calling it from templates

```php
{control breadCrumb}
```
finally if you have your own template you can call with customTemplate($template) on the presenter class, by example

```php
// on your component declaration (maybe called BasePresenter.php) 
$breadCrumb->customTemplate($this->context->getParameters()['appDir'].'/templates/@BreadCrumb.latte');

// or on your regular presenter
$this['breadCrumb']->customTemplate($this->context->getParameters()['appDir'].'/templates/@BreadCrumb.latte');
```

by the way context on presenters are deprecated, read this http://forum.nette.org/en/22075-context-on-presenter-is-deprecated?. so please take the necessary measures
