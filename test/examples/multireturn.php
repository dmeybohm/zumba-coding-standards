<?php

namespace Zumba\CodingStandards\Test;

/**
 * This is a bug in the current void detector: we only check the first return
 *
 * @return void
 */
function foobar() {
	if (strlen("hello")) {
		return;
	}
	return "hello";
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
