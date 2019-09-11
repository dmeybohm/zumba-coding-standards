<?php

namespace Zumba\CodingStandards\Test;

class Foo {

	/**
	 * Test that as long as the open brace is on the same line, it's acceptable.
	 */
	public function functionWithEmptyBody() : void {}

	/**
	 * Test that not on the same line is not acceptable.
	 */
	public function withContentNotOnTheSameLine() : void {
		if ($undefined) {
			echo "hello"; }
	}

	/**
	 * Test one line closures are ok if they only have a single statement.
	 */
	public function oneLineClosures() : void {
	    $a = function() { return 'hello'; }; // allowed
	    $b = function() {
	        return 'hello'; }; // not allowed
	    $c = function() { $a = 'hello'; $b = 'goodbye'; }; // not allowed
        $d = function() { $a = 'hello'; $b = 'goodbye'; // not allowed
        };
        $e = function() {
            $a = 'hello'; $b = 'goodbye'; // not allowed
            $c = 'hello'; $d = 'goodbye'; // not allowed
        };
	}

	/**
	 * Test multiple statements on the same line.
	 */
	public function testMultipleStatements(): void {
	    $a = 1; $b = 2; // not allowed
	}
}
?>
--EXPECT--

----------------------------------------------------------------------
FOUND 8 ERRORS AFFECTING 7 LINES
----------------------------------------------------------------------
 17 | ERROR | [x] Closing brace must be on a line by itself
    |       |     (Zumba.WhiteSpace.ScopeClosingBrace.ContentBefore)
 26 | ERROR | [x] Closing brace must be on a line by itself
    |       |     (Zumba.WhiteSpace.ScopeClosingBrace.ContentBefore)
 27 | ERROR | [x] Each PHP statement must be on a line by itself
    |       |     (Zumba.Formatting.DisallowMultipleStatements.SameLine)
 27 | ERROR | [x] Each PHP statement must be on a line by itself
    |       |     (Zumba.Formatting.DisallowMultipleStatements.SameLine)
 28 | ERROR | [x] Each PHP statement must be on a line by itself
    |       |     (Zumba.Formatting.DisallowMultipleStatements.SameLine)
 31 | ERROR | [x] Each PHP statement must be on a line by itself
    |       |     (Zumba.Formatting.DisallowMultipleStatements.SameLine)
 32 | ERROR | [x] Each PHP statement must be on a line by itself
    |       |     (Zumba.Formatting.DisallowMultipleStatements.SameLine)
 40 | ERROR | [x] Each PHP statement must be on a line by itself
    |       |     (Zumba.Formatting.DisallowMultipleStatements.SameLine)
----------------------------------------------------------------------
PHPCBF CAN FIX THE 8 MARKED SNIFF VIOLATIONS AUTOMATICALLY
----------------------------------------------------------------------
