<?php

trait Foo {
	/**
	 * Test static:: and self:: inside a trait.
	 *
	 * @return void
	 */
	function bar() {
		static::$something = 'bar';
	}
}
?>
--EXPECT--
