<?php

class Foo {
	/**
	 * Try to access a $this variable within a closure.
	 *
	 * @return void
	 */
	public function thisWithinClosure() {
		$a = function () {
			echo $this->a;
		};
		$a();
	}
}
?>
--EXPECT--

