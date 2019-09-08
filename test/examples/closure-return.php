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

----------------------------------------------------------------------
FOUND 1 ERROR AFFECTING 1 LINE
----------------------------------------------------------------------
 14 | ERROR | Function return type is void, but function contains
    |       | return statement
    |       | (Zumba.Commenting.FunctionComment.InvalidReturnVoid)
----------------------------------------------------------------------
