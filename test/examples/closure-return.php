<?php

namespace Zumba\CodingStandards\Test;

/**
 * This checks the the return inside a closure does not error, while the return with a value in a void function does.
 *
 * @return void
 */
function foobar() {
	$hello = function() {
		return 'hello';
	};
	return "string";
}
?>
--EXPECT--

