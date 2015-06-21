<?php
/**
 * @param $module
 *
 *  Creating the navigation bar
 *
 *   controller array contains
 *     action               what view to execute
 *     caption              displays on navidation menu
 *     url                  seo-compliant url
 *     id                   id for the li tag
 *     ckass                class for the li tag
 *     liLink               contains the classes used in the A tag link for:
 *       lclass             div class tag
 *       iclass             i tag
 *       sclass             span tag
 *       useCaptionInSpan   is the caption used in the span tag or elsewhere
 *       data               array of information used in a data tag
 */
function getSeo($moduleName) {
  $seo_formats = array(
    // module =>
    'plinth' => array(
      // controllers =>
      'home' => array(
        'action' => 'index',
        'caption' => 'Home',
        'url' => 'home',
        'id' => 'home',
        'class' => 'vw_nav',
        'liLink' => array(
            'lclass' => '',
            'iclass' => 'glyphicon glyphicon-home',
            'sclass' => '',
            'useCaptionInSpan' => true,
            'data'   => array(
            ),
        ),
        'submenu' => array(
          'voter' => array(
            'action' => 'video',
            'caption' => '',
            'url' => 'voter-video',
            'id' => '',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
          'politician' => array(
            'action' => 'video',
            'caption' => '',
            'url' => 'politician-video',
            'id' => '',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
        ),
      ),
    ),
// Start of qa module
    'qa' => array(
      'topic' => array(
        'action' => 'index',
        'caption' => 'Voter Issues',
        'url' => 'voter-issues',
        'id' => 'topic',
        'class' => 'vw_nav topc',
        'liLink' => array(
            'lclass' => '',
            'iclass' => '.glyphicon glyphicon-list',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
        'submenu' => array(
          'subtopic' => array(
            'action' => '',
            'caption' => '',
            'url' => '',
            'id' => 'subtopic',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
        ),
      ),
      'question' => array(
        'action' => 'index',
        'caption' => '',
        'url' => 'questions',
        'id' => 'question',
        'class' => 'vw_nav',
        'liLink' => array(
            'lclass' => '',
            'iclass' => 'glyphicon glyphicon-question-sign',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
      ),
      'background' => array(
        'action' => 'index',
        'caption' => '',
        'url' => 'topic-background',
        'id' => 'background',
        'class' => 'vw_nav',
        'liLink' => array(
            'lclass' => '',
            'iclass' => 'glyphicon glyphicon-comment',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
      ),
      'subtopic' => array(
        'action' => 'index',
        'caption' => 'Voter Concerns',
        'url' => 'voter-concerns',
        'id' => 'subtopic',
        'class' => 'vw_nav subt',
        'liLink' => array(
            'lclass' => '',
            'iclass' => '',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
        'submenu' => array(
          'subtopic' => array(
            'action' => '',
            'caption' => '',
            'url' => '',
            'id' => 'subtopic',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
        ),
      ),
    ),      


// Start of vm module
    'vw' => array(
      // controller =>
      'home' => array(
        'action' => 'index',
        'caption' => 'Home',
        'url' => 'home',
        'id' => '',
        'class' => '',
        'liLink' => array(
            'lclass' => '',
            'iclass' => '',
            'sclass' => '',
            'useCaptionInSpan' => false,
        ),
      ),
      'donate' => array(
        'action' => 'index',
        'caption' => 'Donate',
        'url' => 'donate',
        'id' => '',
        'class' => '',
        'liLink' => array(
            'lclass' => '',
            'iclass' => '',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
        'submenu' => array(
          '' => array(
            'action' => '',
            'caption' => '',
            'url' => '',
            'id' => '',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
        ),
      ),
      'profile' => array(
        'action' => 'index',
        'caption' => 'Profile',
        'url' => 'profile',
        'id' => '',
        'class' => '',
        'liLink' => array(
            'lclass' => '',
            'iclass' => '',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
        'submenu' => array(
          '' => array(
            'action' => '',
            'caption' => '',
            'url' => '',
            'id' => '',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
        ),
      ),
      'express' => array(
        'action' => 'index',
        'caption' => 'Express Yourself',
        'url' => 'express-yourself',
        'id' => '',
        'class' => '',
        'liLink' => array(
            'lclass' => '',
            'iclass' => '',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
        'submenu' => array(
          '' => array(
            'action' => '',
            'caption' => '',
            'url' => '',
            'id' => '',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
        ),
      ),
      'learn' => array(
        'action' => 'index',
        'caption' => 'Learn',
        'url' => 'learn',
        'id' => '',
        'class' => '',
        'liLink' => array(
            'lclass' => '',
            'iclass' => '',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
        'submenu' => array(
          '' => array(
            'action' => '',
            'caption' => '',
            'url' => '',
            'id' => '',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
        ),
      ),
      'discuss' => array(
        'action' => 'index',
        'caption' => 'Discuss',
        'url' => 'discussions',
        'id' => '',
        'class' => '',
        'liLink' => array(
            'lclass' => '',
            'iclass' => '',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
        'submenu' => array(
          '' => array(
            'action' => '',
            'caption' => '',
            'url' => '',
            'id' => '',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
        ),
      ),
      'help' => array(
        'action' => 'index',
        'caption' => 'Help',
        'url' => 'help',
        'id' => '',
        'class' => '',
        'liLink' => array(
            'lclass' => '',
            'iclass' => '',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
        'submenu' => array(
          '' => array(
            'action' => '',
            'caption' => '',
            'url' => '',
            'id' => '',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
        ),
      ),
      'contact' => array(
        'action' => 'index',
        'caption' => 'Contact',
        'url' => 'contact-us',
        'id' => '',
        'class' => '',
        'liLink' => array(
            'lclass' => '',
            'iclass' => '',
            'sclass' => '',
            'useCaptionInSpan' => false,
            'data'   => array(
            ),
        ),
        'submenu' => array(
          '' => array(
            'action' => '',
            'caption' => '',
            'url' => '',
            'id' => '',
            'class' => '',
            'liLink' => array(
                'lclass' => '',
                'iclass' => '',
                'sclass' => '',
                'useCaptionInSpan' => false,
            ),
            'any' => true,
          ),
        ),
      ),
    ),
  );

    foreach ($seo_formats as $module=>$controllers) {
        if ($module == lcfirst($moduleName)) {
            return $controllers;
        }
    }
    return (array());
}

/**
 * @param $controllers
 * @param $nameIndex
 * @param $retType
 * @return mixed
 */
function getController ($controllers, $nameIndex, $retType) {
    // Find the controller based on the index requested
    $x = 0;
    foreach ($controllers as $controller=>$options) {
        if (is_string($nameIndex) && $controller == $nameIndex) {
            break;
        } else if (is_numeric($nameIndex) && $x == $nameIndex) {
            break;
        }
        $x++;
    }

    switch ($retType) {
        case CONTROLLER:
            $ret = $controller;
            break;
        case INDEX:
            $ret = $x;
            break;
        case OPTIONS:
            $ret = $options;
            break;
        case URL_LINK:
            $ret = $options['url'];
            break;
        default:
            $ret = "";
    }
    return ($ret);
}

// Issues are top level Topics
function getIssues () {
  $topIssues = array(
    'civil-liberties' => array(
        'caption' => 'Civil Liberties',
    ),
    'crime-and-punishment' => array(
        'caption' => 'Crime/<br>Punishment',
    ),
    'education' => array(
        'caption' => 'Education',
    ),
    'energy' => array(
        'caption' => 'Energy',
    ),
    'environment' => array(
        'caption' => 'Environment',
    ),
    'gun-control' => array(
        'caption' => 'Gun Control',
    ),
    'health-safety' => array(
        'caption' => 'Health/Safety',
    ),
    'immigration' => array(
        'caption' => 'Immigration',
    ),
    'infrastructure' => array(
        'caption' => 'Infrastructure',
    ),
    'international-relations' => array(
        'caption' => 'International Rel',
    ),
    'jobs-economy' => array(
        'caption' => 'Jobs/Economy',
    ),
    'quality-of-life' => array(
        'caption' => 'Quality of Life',
    ),
    'reproduction' => array(
        'caption' => 'Reproduction',
    ),
    'taxes' => array(
        'caption' => 'Taxes',
    ),
    'social-services' => array(
        'caption' => 'Social Services',
    ),
  );
  return ($topIssues);
}

function getSubTopics ($moduleName) {
  $subTopics = array(
  );
  return ($subTopics);
}
