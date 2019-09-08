<?php
/**
 * Parses function doc comments.
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

use PHP_CodeSniffer\Files\File;

/**
 * Parses function doc comments.
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
class FunctionCommentParser extends AbstractParser {

    /**
     * The parameter elements within this function comment.
     *
     * @var array(PHP_CodeSniffer_CommentParser_ParameterElement)
     */
    private $_params = array();

    /**
     * The return element in this function comment.
     *
     * @var PairElement.
     */
    private $_return = null;

    /**
     * The throws element list for this function comment.
     *
     * @var array(PHP_CodeSniffer_CommentParser_PairElement)
     */
    private $_throws = array();


    /**
     * Constructs a PHP_CodeSniffer_CommentParser_FunctionCommentParser.
     *
     * @param string                      $comment   The comment to parse.
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The file that this comment is in.
     */
    public function __construct($comment, File $phpcsFile) {
        parent::__construct($comment, $phpcsFile);

    }//end __construct()


    /**
     * Parses parameter elements.
     *
     * @param array(string) $tokens The tokens that comprise this sub element.
     *
     * @return ParameterElement
     */
    protected function parseParam($tokens) {
        $param = new ParameterElement(
            $this->previousElement,
            $tokens,
            $this->phpcsFile
        );

        $this->_params[] = $param;

        return $param;

    }//end parseParam()


    /**
     * Parses return elements.
     *
     * @param array(string) $tokens The tokens that comprise this sub element.
     *
     * @return PairElement
     */
    protected function parseReturn($tokens) {
        $return = new PairElement(
            $this->previousElement,
            $tokens,
            'return',
            $this->phpcsFile
        );

        $this->_return = $return;

        return $return;

    }//end parseReturn()


    /**
     * Parses throws elements.
     *
     * @param array(string) $tokens The tokens that comprise this sub element.
     *
     * @return PairElement
     */
    protected function parseThrows($tokens) {
        $throws = new PairElement(
            $this->previousElement,
            $tokens,
            'throws',
            $this->phpcsFile
        );

        $this->_throws[] = $throws;

        return $throws;

    }//end parseThrows()


    /**
     * Returns the parameter elements that this function comment contains.
     *
     * Returns an empty array if no parameter elements are contained within
     * this function comment.
     *
     * @return ParameterElement[]
     */
    public function getParams() {
        return $this->_params;

    }//end getParams()


    /**
     * Returns the return element in this function comment.
     *
     * Returns null if no return element exists in the comment.
     *
     * @return PairElement
     */
    public function getReturn() {
        return $this->_return;

    }//end getReturn()


    /**
     * Returns the throws elements in this function comment.
     *
     * Returns empty array if no throws elements in the comment.
     *
     * @return array(PHP_CodeSniffer_CommentParser_PairElement)
     */
    public function getThrows() {
        return $this->_throws;

    }//end getThrows()


    /**
     * Returns the allowed tags that can exist in a function comment.
     *
     * @return array(string => boolean)
     */
    protected function getAllowedTags() {
        return array(
            'param' => false,
            'return' => true,
            'throws' => false,
        );

    }//end getAllowedTags()


}//end class

?>
