<?php declare(strict_types = 1);

namespace Zumba\CodingStandards\Test;

class ClassWithProtectedConstants {

	protected const CONSTANT_ONE = I18n::DEFAULT_LOCALE;
	protected const CONSTANT_TWO = Country::DEFAULT;

	/**
	 * @var \Zumba\Model\User
	 */
	protected $users;
}
?>
--EXPECT--

