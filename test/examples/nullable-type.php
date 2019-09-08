<?php

namespace Zumba\CodingStandards\Test;

use OtherType as RelativeType;
class NullableTypeTest {
	/**
	 * NullableTypeTest constructor.
	 *
	 * @param NullableTypeTest|null $nullableType
	 */
	public function __construct(
		?NullableTypeTest $nullableType,
		?Relative\NullableType $relativeNullableType,
		?\Zumba\CodingStandards\Test\NullableTypeTest $absoluteNullableType
	) {
		$this->foo = $nullableType?'cheese':'bar';
		$this->bar = $nullableType ?\Zumba\CodingStandards\Test\NullableTypeTest::$staticVar : 2;
		$this->bar = $nullableType ?
			function(?\Zumba\CodingStandards\Test\NullableTypeTest $staticVar) {

			} : 2;
	}

	/**
	 * Description
	 *
	 * @param NullableTypeTest|null $nullableType
	 * @return NullableTypeTest|null
	 */
	public function returnType(?NullableTypeTest $nullableType) : ?NullableTypeTest {
		return null;
	}

	/**
	 * Description
	 *
	 * @return Relative\NullableType|null
	 */
	public function relativeReturn() : ?Relative\NullableType {
		return null;
	}

	/**
	 * Description
	 *
	 * @return NullableTypeTest|null
	 */
	public function absoluteReturn() : ?\Zumba\CodingStandards\Test\NullableTypeTest {
		return null;
	}

	/**
	 * Relative param
	 *
	 * @param null|\Zumba\CodingStandards\Test\Relative\NullableType $relativeParam
	 */
	public function relativeParam(?Relative\NullableType $relativeParam) : void {

	}

	/**
	 * Absolute param.
	 *
	 * @param \Zumba\CodingStandards\Test\NullableTypeTest $test
	 */
	public function absoluteParam(?\Zumba\CodingStandards\Test\NullableTypeTest $test) : void {

	}
}

?>
--EXPECT--
----------------------------------------------------------------------
FOUND 5 ERRORS AFFECTING 2 LINES
----------------------------------------------------------------------
 17 | ERROR | [x] Expected 1 space before "?"; 0 found
    |       |     (Zumba.WhiteSpace.OperatorSpacing.NoSpaceBefore)
 17 | ERROR | [x] Expected 1 space after "?"; 0 found
    |       |     (Zumba.WhiteSpace.OperatorSpacing.NoSpaceAfter)
 17 | ERROR | [x] Expected 1 space before ":"; 0 found
    |       |     (Zumba.WhiteSpace.OperatorSpacing.NoSpaceBefore)
 17 | ERROR | [x] Expected 1 space after ":"; 0 found
    |       |     (Zumba.WhiteSpace.OperatorSpacing.NoSpaceAfter)
 18 | ERROR | [x] Expected 1 space after "?"; 0 found
    |       |     (Zumba.WhiteSpace.OperatorSpacing.NoSpaceAfter)
----------------------------------------------------------------------
PHPCBF CAN FIX THE 5 MARKED SNIFF VIOLATIONS AUTOMATICALLY
----------------------------------------------------------------------

