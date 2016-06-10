<?php

class Livro {

	private $id, $name, $year, $author, $qut;

	public function __construct( $id, $name, $year, $author, $qut ) {
		$this->id     = $id;
		$this->name   = $name;
		$this->year   = $year;
		$this->author = $author;
		$this->qut    = $qut;
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getYear() {
		return $this->year;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function getQut() {
		return $this->qut;
	}
}
