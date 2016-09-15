<?php

namespace KayStrobach\Mailformfilter\UserFunc;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class MailFormFilter {
    /**
     * Reference to the parent (calling) cObject set from TypoScript
     * @var ContentObjectRenderer
     */
    public $cObj;

    /**
     * Filters Adresses from the given data and manipulates the form
     *
     * @param string $value
     * @param array $conf
     *
     * @return string
     */
    function preUserFunc($value, $conf=array()) {
        $errors = array();
        $bodyText = $this->cObj->cObjGetSingle($conf['bodytext'], $conf['bodytext.']);
        $address = $this->cObj->cObjGetSingle($conf['recipient'], $conf['recipient.']);
        $filterAddress = $this->cObj->cObjGetSingle($conf['filterAddress'], $conf['filterAddress.']);

        $filters = explode('|', $filterAddress);

        foreach ($filters as $filter) {
            if(strpos($address, $filter) !== FALSE) {
                $errors[] = $filter . ' ' . $this->cObj->cObjGetSingle($conf['messages.']['mailpartNotAllowed'], $conf['messages.']['mailpartNotAllowed.']);
            }
        }

        return $this->processErrors($errors, $value);
    }

    public function processErrors($errors, $value) {
        if(count($errors) === 0) {
            return $value;
        }

        $buffer = '';
        foreach($errors as $error) {
            $buffer .= '<li>' . htmlspecialchars($error) . '</li>';
        }

        return '<div style="background-color:red; color:white; padding: 20px;"><ul>' . $buffer . '</ul></div>';
    }
}