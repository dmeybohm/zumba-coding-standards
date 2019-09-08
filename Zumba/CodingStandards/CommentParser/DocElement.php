<?php
/**
 * A DocElement represents a logical element within a Doc Comment.
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
 * A DocElement represents a logical element within a Doc Comment.
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
interface DocElement {


    /**
     * Returns the name of the tag this element represents, omitting the @ symbol.
     *
     * @return string
     */
    public function getTag();


    /**
     * Returns the whitespace that exists before this element.
     *
     * @return string
     * @see getWhitespaceAfter()
     */
    public function getWhitespaceBefore();


    /**
     * Returns the whitespace that exists after this element.
     *
     * @return string
     * @see getWhitespaceBefore()
     */
    public function getWhitespaceAfter();


    /**
     * Returns the order that this element appears in the doc comment.
     *
     * The first element in the comment should have an order of 1.
     *
     * @return int
     */
    public function getOrder();


    /**
     * Returns the element that appears before this element.
     *
     * @return DocElement
     * @see getNextElement()
     */
    public function getPreviousElement();


    /**
     * Returns the element that appears after this element.
     *
     * @return DocElement
     * @see getPreviousElement()
     */
    public function getNextElement();


    /**
     * Returns the line that this element started on.
     *
     * @return int
     */
    public function getLine();


    /**
     * Returns the raw content of this element, omitting the tag.
     *
     * @return string
     */
    public function getRawContent();


}//end interface

?>
