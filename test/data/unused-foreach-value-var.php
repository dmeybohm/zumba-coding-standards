<?php

/**
 * Tests that the key and value are both checked for use.
 *
 * @return void
 */
function f() {
	$a = ["hello" => "goodbye"];
	foreach ($a as $key => $value) {
	}
}

/**
 * Tests that use check for the value is ignored if the key is used.
 *
 * @return void
 */
function g() {
	$a = ["hello" => "goodbye"];
	foreach ($a as $key => $value) {
	    echo $key;
	}
}

/**
 * Tests that the key part is marked unused if value is used.
 *
 * @return void
 */
function h() {
	$a = ["hello" => "goodbye"];
	foreach ($a as $key => $value) {
	    echo $value;
	}
}
?>
--EXPECT--

--------------------------------------------------------------------------------
FOUND 0 ERROR(S) AND 3 WARNING(S) AFFECTING 1 LINE(S)
--------------------------------------------------------------------------------
 10 | WARNING | Unused variable $key.
 10 | WARNING | Unused variable $value.
 33 | WARNING | Unused variable $key.
+--------------------------------------------------------------------------------
