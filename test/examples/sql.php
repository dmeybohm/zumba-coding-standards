<?php

namespace Zumba\CodingStandards\Test;

class SqlTest {

	/**
	 * @var string
	 */
	protected $table;

	/**
	 * Dummy query method.
	 */
	protected function query(string $sql): void {}

	/**
	 * This is allowed.
	 */
	public function testSingleLineSql() : void {
		// Allowed:
		$this->query('SELECT * FROM users WHERE id = :userId');

		// Not Allowed:
		$this->query('SELECT * FROM ' . $this->table .
			' WHERE id = :userId');
	}

	/**
	 * Test the sql with the quote starting on the previous line.
	 */
	public function testStartSqlWithQuoteOnPreviousLine() : void {
		// Allowed:
		$this->query('
			SELECT * FROM users
			WHERE id = :userId
		');

		// Allowed:
		$this->query('
			SELECT * FROM ' . $this->table . '
			WHERE id = :userId
		');

		// Not allowed:
		$this->query('
			SELECT * FROM users
		WHERE id = :userId
		');

		// Not allowed:
		$this->query('
			SELECT * FROM ' . $this->table . '
		WHERE id = :userId
		');
	}

	/**
	 * Test starting the SQL on the next line.
	 */
	public function testStartSqlOnNextLine() : void {
		// Allowed:
		$this->query(
			'
				SELECT * FROM users
				WHERE id = :userId
			'
		);

		// Allowed:
		$this->query(
			'
				SELECT * FROM users
				WHERE id = :userId
		');

		// Not allowed:
		$this->query(
			'
				SELECT * FROM users
			WHERE id = :userId
		');
	}
}
?>
--EXPECT--

