<?php

call_user_func(function() {
	$path = 'ingatlancom/variable-analysis/Sniffs/CodeAnalysis/VariableAnalysisSniff.php';
	// This file is just a wrapper so we can put this in our ruleset.xml:
	if (@include_once __DIR__ . '/../../../../../' . $path) {
		return;
	}
	// If we're installed in the zumba-coding standards dir itself, the plugin is in the vendor dir:
	require_once __DIR__ . '/../../../vendor/' . $path;
});

class Zumba_Sniffs_PHP_VariableAnalysisSniff extends Generic_Sniffs_CodeAnalysis_VariableAnalysisSniff {

	/**
	 * Whether to force display of warnings.
	 *
	 * @var bool
	 */
	public $forceDisplayOfWarnings = false;

	/**
	 * Whether to disable the check for static members.
	 *
	 * @var bool
	 */
	public $disableCheckForStaticMembers = false;

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
	 * @param int                  $stackPtr  The position of the current token
	 *                                        in the stack passed in $tokens.
	 *
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr) {
		if (!$this->forceDisplayOfWarnings) {
			parent::process($phpcsFile, $stackPtr);
			return;
		}
		$saveWarningSeverity = $phpcsFile->phpcs->cli->warningSeverity;
		$phpcsFile->phpcs->cli->warningSeverity = 1;
		parent::process($phpcsFile, $stackPtr);
		$phpcsFile->phpcs->cli->warningSeverity = $saveWarningSeverity;
	}

	/**
	 * @param \PHP_CodeSniffer_File $phpcsFile
	 * @param int $stackPtr
	 * @return bool|int|string
	 */
	function findVariableScope(
		PHP_CodeSniffer_File $phpcsFile,
		$stackPtr
	) {
		$tokens = $phpcsFile->getTokens();
		$token  = $tokens[$stackPtr];

		$in_class = false;
		if (!empty($token['conditions'])) {
			foreach (array_reverse($token['conditions'], true) as $scopePtr => $scopeCode) {
				if (($scopeCode === T_FUNCTION) || ($scopeCode === T_CLOSURE)) {
					return $scopePtr;
				}
				if (($scopeCode === T_CLASS) || ($scopeCode === T_INTERFACE)) {
					$in_class = true;
				}
				if ($scopeCode === T_TRAIT) {
					$in_class = true;
				}
			}
		}

		if (($scopePtr = $this->findFunctionPrototype($phpcsFile, $stackPtr)) !== false) {
			return $scopePtr;
		}

		if ($in_class) {
			// Member var of a class, we don't care.
			return false;
		}

		// File scope, hmm, lets use first token of file?
		return 0;
	}

	/**
	 * @param PHP_CodeSniffer_File $phpcsFile
	 * @param int $stackPtr
	 * @param string $varName
	 * @param int $currScope
	 */
	protected function checkForForeachLoopVar(
		PHP_CodeSniffer_File $phpcsFile,
		$stackPtr,
		$varName,
		$currScope
	)
	{
		$found = parent::checkForForeachLoopVar($phpcsFile, $stackPtr, $varName, $currScope);
		if ($found) {
			//
			// If we found a variable, and the foreach includes a key and value, mark the value as used:
			//
			if (($openPtr = $this->findContainingBrackets($phpcsFile, $stackPtr)) === false) {
				return $found;
			}
			$token = $phpcsFile->findPrevious(T_DOUBLE_ARROW, $stackPtr - 1, $openPtr);
			if ($token !== false) {
				// found a double arrow: mark the value as used:
				$this->markVariableRead($varName, $stackPtr, $currScope);
			}
		}
		return $found;
	}

	/**
	 * @param \PHP_CodeSniffer_File $phpcsFile
	 * @param int $stackPtr
	 * @param string $varName
	 * @param int $currScope
	 * @return bool
	 */
	protected function checkForStaticMember(
		PHP_CodeSniffer_File $phpcsFile,
		$stackPtr,
		$varName,
		$currScope
	) {
		if ($this->disableCheckForStaticMembers) {
			$tokens = $phpcsFile->getTokens();
			$token  = $tokens[$stackPtr];

			// Are we a static member?
			$doubleColonPtr = $stackPtr - 1;
			if ($tokens[$doubleColonPtr]['code'] !== T_DOUBLE_COLON) {
				return false;
			}
			$classNamePtr = $stackPtr - 2;
			if (($tokens[$classNamePtr]['code'] !== T_STRING) &&
				($tokens[$classNamePtr]['code'] !== T_SELF) &&
				($tokens[$classNamePtr]['code'] !== T_STATIC)
			) {
				return false;
			}

			// Are we refering to self:: outside a class?
			// TODO: not sure this is our business or should be some other sniff.
			if (($tokens[$classNamePtr]['code'] === T_SELF) ||
				($tokens[$classNamePtr]['code'] === T_STATIC)
			) {
				// Disable the check.
				return true;
			}
			return false;
		}
		return parent::checkForStaticMember($phpcsFile, $stackPtr, $varName, $currScope);
	}


}
