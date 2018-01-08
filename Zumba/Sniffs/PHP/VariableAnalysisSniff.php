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

}
