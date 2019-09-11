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
----------------------------------------------------------------------
FOUND 4 ERRORS AFFECTING 4 LINES
----------------------------------------------------------------------
 25 | ERROR | The last line in multi-line SQL must be in a single
    |       | line (Zumba.Formatting.SQL.LastSQLLine) XXX diff error here
 49 | ERROR | Multi-line SQL not indented correctly; expected 3
    |       | spaces but found 2
    |       | (Zumba.Formatting.SQL.AlignSQLLine)
 54 | ERROR | Multi-line SQL not indented correctly; expected 2
    |       | spaces but found 3
    |       | (Zumba.Formatting.SQL.AlignSQLLine)
 82 | ERROR | Multi-line SQL not indented correctly; expected 4
    |       | spaces but found 3
    |       | (Zumba.Formatting.SQL.AlignSQLLine)
----------------------------------------------------------------------
