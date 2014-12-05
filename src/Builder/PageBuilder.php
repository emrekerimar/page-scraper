<?php

namespace PageScrapper\Builder;

class PageBuilder extends AbstractPageBuilder
{

	protected $html;

	public function fetchPage()
	{
		$url = $this->getPage()->getUrl();
		$this->html = file_get_contents($url);
		return $this;
	}

	public function initializeHtml()
	{
		$this->getPage()->setHtml($this->html);
		return $this;
	}

	public function initializeDomDocument()
	{
		$doc = new \DomDocument();
		$doc->loadHTML($this->html);
		$this->getPage()->setDocument($doc);
		return $this;
	}

	public function initializeDomXpath()
	{
		$xpath = new \DOMXpath($this->getPage()->getDocument());
		$this->getPage()->setXpath($xpath);
		return $this;
	}

}