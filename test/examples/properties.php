<?php declare(strict_types=1);

namespace Zumba\CodingStandards\Test;

class TestProperties {

	/** @var string */
	public $shortProperty;

	/** @var \Zumba\CodingStandards\Test\TestProperties[] Set the property here to something. */
	protected $shortPropertyWithDescription;

	/** @var array<string, \Zumba\CodingStandards\Test\TestProperties[]> Set the property here to something. */
	protected $complexType;

	/** @var ?array<string, \Zumba\CodingStandards\Test\TestProperties[]> Set the property here to something. */
	protected $nullableType;

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
