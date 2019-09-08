<?php
/**
 * Parses class member comments.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

namespace Zumba\CodingStandards\CommentParser;

/**
 * Parses class member comments.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class MemberCommentParser extends ClassCommentParser {

    /**
     * Represents a \@var tag in a member comment.
     *
     * @var SingleElement
     */
    private $_var = null;

    /**
     * Parses Var tags.
     *
     * @param array $tokens The tokens that represent this tag.
     *
     * @return SingleElement
     */
    protected function parseVar($tokens) {
        $this->_var = new SingleElement(
            $this->previousElement,
            $tokens,
            'var',
            $this->phpcsFile
        );

        return $this->_var;

    }//end parseVar()


    /**
     * Returns the var tag found in the member comment.
     *
     * @return PairElement
     */
    public function getVar() {
        return $this->_var;

    }//end getVar()


    /**
     * Returns the allowed tags for this parser.
     *
     * @return array
     */
    protected function getAllowedTags() {
        return array('var' => true);

    }//end getAllowedTags()


}//end class

?>
