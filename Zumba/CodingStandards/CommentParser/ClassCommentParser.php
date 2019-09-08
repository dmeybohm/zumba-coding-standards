<?php
/**
 * Parses Class doc comments.
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
 * Parses Class doc comments.
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
class ClassCommentParser extends AbstractParser {

    /**
     * The package element of this class.
     *
     * @var SingleElement
     */
    private $_package = null;

    /**
     * The subpackage element of this class.
     *
     * @var SingleElement
     */
    private $_subpackage = null;

    /**
     * The version element of this class.
     *
     * @var SingleElement
     */
    private $_version = null;

    /**
     * The category element of this class.
     *
     * @var SingleElement
     */
    private $_category = null;

    /**
     * The copyright elements of this class.
     *
     * @var array(SingleElement)
     */
    private $_copyrights = array();

    /**
     * The licence element of this class.
     *
     * @var PairElement
     */
    private $_license = null;

    /**
     * The author elements of this class.
     *
     * @var array(SingleElement)
     */
    private $_authors = array();


    /**
     * Returns the allowed tags withing a class comment.
     *
     * @return array(string => int)
     */
    protected function getAllowedTags() {
        return array(
            'category' => false,
            'package' => true,
            'subpackage' => true,
            'author' => false,
            'copyright' => true,
            'license' => false,
            'version' => true,
        );

    }//end getAllowedTags()


    /**
     * Parses the license tag of this class comment.
     *
     * @param array $tokens The tokens that comprise this tag.
     *
     * @return PairElement
     */
    protected function parseLicense($tokens) {
        $this->_license = new PairElement(
            $this->previousElement,
            $tokens,
            'license',
            $this->phpcsFile
        );

        return $this->_license;

    }//end parseLicense()


    /**
     * Parses the copyright tags of this class comment.
     *
     * @param array $tokens The tokens that comprise this tag.
     *
     * @return SingleElement
     */
    protected function parseCopyright($tokens) {
        $copyright = new SingleElement(
            $this->previousElement,
            $tokens,
            'copyright',
            $this->phpcsFile
        );

        $this->_copyrights[] = $copyright;

        return $copyright;

    }//end parseCopyright()


    /**
     * Parses the category tag of this class comment.
     *
     * @param array $tokens The tokens that comprise this tag.
     *
     * @return SingleElement
     */
    protected function parseCategory($tokens) {
        $this->_category = new SingleElement(
            $this->previousElement,
            $tokens,
            'category',
            $this->phpcsFile
        );

        return $this->_category;

    }//end parseCategory()


    /**
     * Parses the author tag of this class comment.
     *
     * @param array $tokens The tokens that comprise this tag.
     *
     * @return array(PHP_CodeSniffer_CommentParser_SingleElement)
     */
    protected function parseAuthor($tokens) {
        $author = new SingleElement(
            $this->previousElement,
            $tokens,
            'author',
            $this->phpcsFile
        );

        $this->_authors[] = $author;

        return $author;

    }//end parseAuthor()


    /**
     * Parses the version tag of this class comment.
     *
     * @param array $tokens The tokens that comprise this tag.
     *
     * @return SingleElement
     */
    protected function parseVersion($tokens) {
        $this->_version = new SingleElement(
            $this->previousElement,
            $tokens,
            'version',
            $this->phpcsFile
        );

        return $this->_version;

    }//end parseVersion()


    /**
     * Parses the package tag found in this test.
     *
     * @param array $tokens The tokens that comprise this var.
     *
     * @return SingleElement
     */
    protected function parsePackage($tokens) {
        $this->_package = new SingleElement(
            $this->previousElement,
            $tokens,
            'package',
            $this->phpcsFile
        );

        return $this->_package;

    }//end parsePackage()


    /**
     * Parses the package tag found in this test.
     *
     * @param array $tokens The tokens that comprise this var.
     *
     * @return SingleElement
     */
    protected function parseSubpackage($tokens) {
        $this->_subpackage = new SingleElement(
            $this->previousElement,
            $tokens,
            'subpackage',
            $this->phpcsFile
        );

        return $this->_subpackage;

    }//end parseSubpackage()


    /**
     * Returns the authors of this class comment.
     *
     * @return array(PHP_CodeSniffer_CommentParser_SingleElement)
     */
    public function getAuthors() {
        return $this->_authors;

    }//end getAuthors()


    /**
     * Returns the version of this class comment.
     *
     * @return SingleElement
     */
    public function getVersion() {
        return $this->_version;

    }//end getVersion()


    /**
     * Returns the license of this class comment.
     *
     * @return PairElement
     */
    public function getLicense() {
        return $this->_license;

    }//end getLicense()


    /**
     * Returns the copyrights of this class comment.
     *
     * @return SingleElement
     */
    public function getCopyrights() {
        return $this->_copyrights;

    }//end getCopyrights()


    /**
     * Returns the category of this class comment.
     *
     * @return SingleElement
     */
    public function getCategory() {
        return $this->_category;

    }//end getCategory()


    /**
     * Returns the package that this class belongs to.
     *
     * @return SingleElement
     */
    public function getPackage() {
        return $this->_package;

    }//end getPackage()


    /**
     * Returns the subpackage that this class belongs to.
     *
     * @return SingleElement
     */
    public function getSubpackage() {
        return $this->_subpackage;

    }//end getSubpackage()


}//end class

?>
