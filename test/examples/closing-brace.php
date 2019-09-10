<?php

namespace Zumba\CodingStandards\Test;

class Foo {

	/**
	 * Test that as long as the open brace is on the same line, it's acceptable.
	 */
	public function onTheSameLine() : void {}

	/**
	 * Test that not on the same line, is, however, not acceptable.
	 */
	public function withContentNotOnTheSameLine() : void {
		if ($undefined) {
			echo "hello"; }
	}

	/**
	 * Test one line closures are ok.
	 */
	public function oneLineClosures() : void {
	    $a = function() { return 'hello'; };
	    $b = function() {
	        return 'hello'; };
	}
}
?>
--EXPECT--

----------------------------------------------------------------------
FOUND 1 ERROR AFFECTING 1 LINE
----------------------------------------------------------------------
 17 | ERROR | [x] Closing brace must be on a line by itself
    |       |     (Zumba.WhiteSpace.ScopeClosingBrace.ContentBefore)
 26 | ERROR | [x] Closing brace must be on a line by itself
    |       |     (Zumba.WhiteSpace.ScopeClosingBrace.ContentBefore)
----------------------------------------------------------------------
PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY
----------------------------------------------------------------------
