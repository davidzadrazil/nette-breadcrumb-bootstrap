<?php declare(strict_types=1);

namespace Alnux\NetteBreadCrumb;

/**
 * Class BreadCrumbControl
 *
 * Breadcrumb Component
 * @author David Zadražil <me@davidzadrazil.cz> edit by Leonardo Allende <alnux@ya.ru>
 *
 */

use Exception;
use Nette\Application\UI\Control;
use Nette\Application\UI\Link;

class BreadCrumb extends Control {
    public array $links = [];
    private ?string $templateFile = NULL;

    public function customTemplate($template): void {
        $this->templateFile = $template ? $template : __DIR__ . '/BreadCrumb.latte';
    }

    public function render(): void {
        $this->customTemplate($this->templateFile);
        $this->template->setFile($this->templateFile);
        $this->template->links = $this->links;
        $this->template->render();
    }

    public function addLink(string $title, ?Link $link = NULL, ?string $icon = NULL): void {
        $this->links[md5($title)] = [
            'title' => $title,
            'link' => $link,
            'icon' => $icon
        ];
    }

    /**
     * Remove link
     *
     * @param $key
     *
     * @throws Exception
     */
    public function removeLink($key): void {
        $key = md5($key);
        if(array_key_exists($key, $this->links)) {
            unset($this->links[$key]);
        } else {
            throw new Exception("Key does not exist.");
        }
    }

    /**
     * Edit link
     * @param string $title
     * @param Link|null $link
     * @param string|null $icon
     * @author Leonardo Allende <alnux@ya.ru>
     */
    public function editLink(string $title, ?Link $link = null, ?string $icon = null) {
        if(array_key_exists(md5($title), $this->links)) {
            $this->addLink($title, $link, $icon);
        }
    }
}
