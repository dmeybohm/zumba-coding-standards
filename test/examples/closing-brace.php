<?php

namespace Zumba\CodingStandards\Test;

class Foo {

	/**
	 * As long as the open brace is on the same line, it's acceptable.
	 */
	public function onTheSameLine() : void {}

	/**
	 * Not on the same line, is, however, not acceptable.
	 */
	public function withContentNotOnTheSameLine() : void {
		if ($undefined) {
			echo "hello"; }
	}
}
?>
--EXPECT--

----------------------------------------------------------------------
FOUND 1 ERROR AFFECTING 1 LINE
----------------------------------------------------------------------
 17 | ERROR | [x] Closing brace must be on a line by itself
    |       |     (Zumba.WhiteSpace.ScopeClosingBrace.ContentBefore)
----------------------------------------------------------------------
PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
----------------------------------------------------------------------
