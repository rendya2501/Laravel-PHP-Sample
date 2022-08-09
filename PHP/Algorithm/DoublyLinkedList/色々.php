<?php

class LinkedList{
    private $dummy;
    
    public function __construct(){
        $this->dummy = new Node(null,null,null);
        $this->dummy->next = $this->dummy;
        $this->dummy->prev = $this->dummy;
    }
    
    public function InsertAfter(Node $n,$value):Node{
        $m = new Node($value,$n,$n->Next);
        $n->next->prev = $m;
        $n->next = $m;
        return $n;
    }
    
    public function InsertBefore(Node $n,$value):Node{
        $m = new Node($value,$n->prev,$n);
        $n->prev->next = $m;
        $n->prev = $m;
        return $m;
    }
    
    public function Erase(Node $n):Note{
        if ($n === $this->dummy){
            return $this->dummy;
        }
        $n->prev->next = $n.next;
        $n->next->prev = $n.prev;
        return $n;
    }
    
    public function InsertFirst($value):Node{
        return $this->InsertBefore($this->dummy,$value);
    }
    
    public function InsertLast($value):Node{
        return $this->InsertAfter($this->dummy,$value);
    }
}


class Node{
    public $value;
    public $next;
    public $prev;
    
    public function __construct($value,?Node $next,?Node $prev){
        $this->value = $value;
        $this->next = $next;
        $this->prev = $prev;
    }
}





class DoublyLinkedList {
    private $first = null;
    private $last = null;

    public function add(Element $element) {
        if($this->first === null) {
            $this->first = $element;
            $this->last = $element;
            return;
        }
        $this->last->setNext($element);
        $element->setPrevious($this->last);
        $this->last = $element;
    }

    public function getFirst() {
        return $this->first;
    }

    public function getLast() {
        return $this->last;
    }
}

class Element {
    private $prev;
    private $next;
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function setPrevious(Element $element) {
        $this->prev = $element;
    }

    public function setNext(Element $element) {
        $this->next = $element;
    }

    public function setData($value) {
        $this->value = $value;
    }
}