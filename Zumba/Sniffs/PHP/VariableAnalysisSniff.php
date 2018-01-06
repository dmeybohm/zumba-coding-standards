<?php

call_user_func(function() {
	$path = '/ingatlancom/variable-analysis/Sniffs/CodeAnalysis/VariableAnalysisSniff.php';
	// This file is just a wrapper so we can πut this in our ruleset.xml:
	if (@include_once __DIR__ . '/../../../../..' . $path) {
		return;
	}
	// If we're installed in the zumba-coding standards dir itself, the plugin is in the vendor dir:
	require_once __DIR__ . '/../../../vendor/' . $path;
});

class Zumba_Sniffs_PHP_VariableAnalysisSniff extends Generic_Sniffs_CodeAnalysis_VariableAnalysisSniff {
}
