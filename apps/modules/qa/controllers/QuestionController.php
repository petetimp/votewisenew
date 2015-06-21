<?php
namespace VoteWise\QA\Controller;

use Phalcon\Tag as Tag;
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class QuestionController extends ControllerBase
{

/*
    public function initialize()
    {
        $this->view->setTemplateAfter('main');
        Phalcon\Tag::setTitle('Questions');
        parent::initialize();
    }
*/
    
    /**
     * Index action
     */
    public function indexAction()
    {
        Tag::setTitle('Questions');
        $this->persistent->parameters = null;
        //NAVIGATION HERE:
        $this->view->setTemplateAfter('main');
    }

    /**
     * Searches for questions
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Ques", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "quesid";

        $question = Question::find($parameters);
        if (count($question) == 0) {
            $this->flash->notice("The search did not find any questions");

            return $this->dispatcher->forward(array(
                "controller" => "question",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $question,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displayes the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a question
     *
     * @param string $quesid
     */
    public function editAction($quesid)
    {

        if (!$this->request->isPost()) {

            $que = Question::findFirstByQuesId($quesid);
            if (!$que) {
                $this->flash->error("Question was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "question",
                    "action" => "index"
                ));
            }

            $this->view->quesid = $que->quesid;

            $this->tag->setDefault("quesid", $que->getQuesId());
            $this->tag->setDefault("desc", $que->getDesc());
            $this->tag->setDefault("order", $que->getOrder());
            $this->tag->setDefault("bkgrid", $que->getBkgrId());
            $this->tag->setDefault("qtype", $que->getQtype());
            $this->tag->setDefault("amttext", $que->getAmtText());
            $this->tag->setDefault("amttype", $que->getAmtType());
            $this->tag->setDefault("crdt", $que->getCrdt());
            $this->tag->setDefault("crdtid", $que->getCrdtId());
            $this->tag->setDefault("updt", $que->getUpdt());
            $this->tag->setDefault("updtid", $que->getUpdtId());
            $this->tag->setDefault("delmark", $que->getDelmark());
            
        }
    }

    /**
     * Creates a new question
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "question",
                "action" => "index"
            ));
        }

        $que = new Question();

        $que->setQuesId($this->request->getPost("quesid"));
        $que->setDesc($this->request->getPost("desc"));
        $que->setOrder($this->request->getPost("order"));
        $que->setBkgrId($this->request->getPost("bkgrid"));
        $que->setQtype($this->request->getPost("qtype"));
        $que->setAmtText($this->request->getPost("amttext"));
        $que->setAmtType($this->request->getPost("amttype"));
        $que->setCrdt($this->request->getPost("crdt"));
        $que->setCrdtId($this->request->getPost("crdtid"));
        $que->setUpdt($this->request->getPost("updt"));
        $que->setUpdtId($this->request->getPost("updtid"));
        $que->setDelmark($this->request->getPost("delmark"));
        

        if (!$que->save()) {
            foreach ($que->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "ques",
                "action" => "new"
            ));
        }

        $this->flash->success("Question was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "question",
            "action" => "index"
        ));

    }

    /**
     * Saves a question edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "question",
                "action" => "index"
            ));
        }

        $quesid = $this->request->getPost("quesid");

        $que = Question::findFirstByQuesId($quesid);
        if (!$que) {
            $this->flash->error("Question does not exist " . $quesid);

            return $this->dispatcher->forward(array(
                "controller" => "question",
                "action" => "index"
            ));
        }

        $que->setQuesId($this->request->getPost("quesid"));
        $que->setDesc($this->request->getPost("desc"));
        $que->setOrder($this->request->getPost("order"));
        $que->setBkgrId($this->request->getPost("bkgrid"));
        $que->setQtype($this->request->getPost("qtype"));
        $que->setAmtText($this->request->getPost("amttext"));
        $que->setAmtType($this->request->getPost("amttype"));
        $que->setCrdt($this->request->getPost("crdt"));
        $que->setCrdtId($this->request->getPost("crdtid"));
        $que->setUpdt($this->request->getPost("updt"));
        $que->setUpdtId($this->request->getPost("updtid"));
        $que->setDelmark($this->request->getPost("delmark"));
        

        if (!$que->save()) {

            foreach ($que->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "question",
                "action" => "edit",
                "params" => array($que->quesid)
            ));
        }

        $this->flash->success("Question was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "question",
            "action" => "index"
        ));

    }

    /**
     * Deletes a question
     *
     * @param string $quesid
     */
    public function deleteAction($quesid)
    {

        $que = Question::findFirstByquesid($quesid);
        if (!$que) {
            $this->flash->error("Question was not found");

            return $this->dispatcher->forward(array(
                "controller" => "question",
                "action" => "index"
            ));
        }

        if (!$que->delete()) {

            foreach ($que->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "question",
                "action" => "search"
            ));
        }

        $this->flash->success("Question was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "question",
            "action" => "index"
        ));
    }

}
