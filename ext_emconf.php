<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: 'contentmigration'
 *
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * 'version' and 'dependencies' must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Mailformfilter',
    'description' => 'Filters invalid Mailforms',
    'category' => 'templates',
    'author' => 'Kay Strobach',
    'author_email' => 'info@kay-strobach.de',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '0.1.0',
    'constraints' => array(
        'depends' => array(
            'typo3' => '7.6.0-7.6.99',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
    'autoload' => array(
        'psr-4' => array(
            'KayStrobach\\Mailformfilter\\' => 'Classes/'
        )
    )
);
