<?php
class Node {
	private ?Node $next;
	private $value;

	public function __construct($value, ?Node $next) {
		$this->next = $next;
		$this->value = $value;
	}

	public function setNext(?Node $next) {
		$this->next = $next;
	}

	public function getNext() : ?Node {
		return $this->next;
	}

	public function setValue($value) {
		$this->value = $value;
	}

	public function getValue() {
		return $this->value;
	}

	public function hasNext() : bool {
		if ($this->next !== null) {
			return true;
		}
		return false;
	}
}

class LinkedList {
	private ?Node $head = null;

	protected function getLastNode() : Node {
		$current = $this->head;
		while ($current->hasNext()) {
			$current = $current->getNext();
		}		
		return $current;
	}

	public function addNextNode($value) : void {
		if ($this->head === null) {
			$this->head = new Node($value, null);
			return;
		}
		$this->getLastNode()->setNext(new Node($value, null));
	}

	public function reverse() : void {
		if ($this->head == null || $this->head->getNext() == null) {
			return;
		}

		$current = $this->head;
		$prev = $next = null;
		while ($current != null) {
			$next = $current->getNext();
			$current->setNext($prev);
			$prev = $current;
			$current = $next;
		}
		$this->head = $prev;
	}
}

$list = new LinkedList();
$list->addNextNode(1);
$list->addNextNode(2);
$list->addNextNode(3);
$list->addNextNode(4);

print_r ($list);
$list->reverse();
print_r ($list);
