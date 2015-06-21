<?php
namespace VoteWise\QA\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;

class QuestionsForm extends Form
{

    public function initialize()
    {
        // Email

        $this->add(new Check("agree"));
        $this->add(new Check("rank"));
        $this->add(new TextArea("comment", array(
            'placeholder' => 'Add Comments'
        )));

    }
}
