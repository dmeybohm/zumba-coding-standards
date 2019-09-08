<?php

namespace Zumba\Sniffs\WhiteSpace;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\WhiteSpace\OperatorSpacingSniff as BaseOperatorSpacingSniff;

/**
 * Zumba_Sniffs_WhiteSpace_OperatorSpacingSniff
 *
 * Handle spacing around operators.
 *
 * Overridden to handle PHP 7 nullable types.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 */
class OperatorSpacingSniff
    extends BaseOperatorSpacingSniff
    implements Sniff {

    public function process(File $phpcsFile, $stackPtr) {
        $tokens = $phpcsFile->getTokens();
        if ($this->isProbablyNullableType($phpcsFile, $tokens, $stackPtr)) {
            return;
        }
        parent::process($phpcsFile, $stackPtr);
    }

    private function isProbablyNullableType(File $phpcsFile, $tokens, $stackPtr) {
        $token = $tokens[$stackPtr];
        if ($token['code'] !== T_INLINE_THEN) {
            return false;
        }

        $namespaceTokenOrIdentifier = $phpcsFile->findNext(
            [T_NS_SEPARATOR, T_STRING],
            $stackPtr + 1,
            null,
            false,
            null,
            true
        );
        if (!$namespaceTokenOrIdentifier) {
            return false;
        }
        $maybeVariableOrOpenBrace = $phpcsFile->findNext(
            [T_WHITESPACE, T_NS_SEPARATOR, T_STRING],
            $stackPtr + 1,
            null,
            true,
            null,
            true
        );
        if (!$maybeVariableOrOpenBrace) {
            return false;
        }
        // if it's a variable, then assume it's a parameter with a nullable type:
        if ($tokens[$maybeVariableOrOpenBrace]['code'] === T_VARIABLE) {
            return true;
        }
        // if it's an opening block, assume it's a return type with a nullable type:
        if ($tokens[$maybeVariableOrOpenBrace]['code'] === T_OPEN_CURLY_BRACKET) {
            return true;
        }
        return false;
    }

}
