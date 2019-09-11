<?php declare(strict_types=1);

namespace Zumba\CodingStandards\Test;

class TestProperties {

	/** @var string */
	public $shortProperty;

	/** @var string Set the property here to something */
	protected $shortPropertyWithDescription;

	/**
	 * @var string
	 */
	private $longPropertyWithoutComment;

	/**
	 * With a comment
	 *
	 * @var string
	 */
	public $longPropertyWithComment;

	protected $propertyWithoutComment;

}
?>
--EXPECT--
----------------------------------------------------------------------
FOUND 1 ERRORS AFFECTING 1 LINES
----------------------------------------------------------------------
 25 | ERROR | Missing variable doc comment
    |       | (Zumba.Commenting.VariableComment.Missing)
----------------------------------------------------------------------
