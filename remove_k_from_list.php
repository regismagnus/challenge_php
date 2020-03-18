<?php
// Singly-linked lists are already defined with this interface:
 class ListNode {
   public $value;
   public $next;

   public function __construct($x) {
     $this->value = $x;
     $this->next = null;
   }

   public function print() {
       echo $this->value;
       if($this->next) {
           echo "/";
           $this->next->print();
       }
   }
 }

/**
 * Note: Try to solve this task in O(n) time using O(1) additional space,
 * where n is the number of elements in the list, since this is what you'll be asked to do during an interview.

Given a singly linked list of integers l and an integer k, remove all elements from list l that have a value equal to k.

Example

For l = [3, 1, 2, 3, 4, 5] and k = 3, the output should be
removeKFromList(l, k) = [1, 2, 4, 5];
For l = [1, 2, 3, 4, 5, 6, 7] and k = 10, the output should be
removeKFromList(l, k) = [1, 2, 3, 4, 5, 6, 7].
 * @param $l
 * @param $k
 * @return mixed
 */
function removeKFromList($l, $k) {
    $current = $l;
    $before=null;
    while($current) {
        if($current->value===$k) {
            if($before) {
                $before->next = $current->next;
            } else
                $l=$current->next;

            $next = $current->next;
            unset($current);
            $current=$next;
        } else {
            $before=$current;
            $current=$current->next;
        }

    }
    return $l;
}

$l=new ListNode(5);
 $l->next=new ListNode(9);
 $l->next->next=new ListNode(99);
 removeKFromList($l, 99)->print();