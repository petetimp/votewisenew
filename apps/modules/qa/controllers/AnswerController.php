<?php
namespace VoteWise\QA\Controller;

use Phalcon\Tag as Tag;
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AnswerController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
        //NAVIGATION HERE:
        $this->view->setTemplateAfter('main');
        Tag::setTitle('Background');
    }

    /**
     * Searches for answ
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Answer", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "answid";

        $answ = Answer::find($parameters);
        if (count($answ) == 0) {
            $this->flash->notice("The search did not find any answ");

            return $this->dispatcher->forward(array(
                "controller" => "answer",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $answ,
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
     * Edits a answer
     *
     * @param string $answid
     */
    public function editAction($answid)
    {

        if (!$this->request->isPost()) {

            $answ = Answer::findFirstByAnswerId($answid);
            if (!$answ) {
                $this->flash->error("answer was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "answer",
                    "action" => "index"
                ));
            }

            $this->view->answid = $answ->answid;

            $this->tag->setDefault("answid", $answ->getAnswId());
            $this->tag->setDefault("quesid", $answ->getQuesId());
            $this->tag->setDefault("userid", $answ->getUserId());
            $this->tag->setDefault("agree", $answ->getAgree());
            $this->tag->setDefault("rank", $answ->getRank());
            $this->tag->setDefault("comment", $answ->getComment());
            $this->tag->setDefault("inans", $answ->getInans());
            $this->tag->setDefault("rankid", $answ->getRankId());
            $this->tag->setDefault("chgreason", $answ->getChgreason());
            $this->tag->setDefault("chgcomment", $answ->getChgcomment());
            $this->tag->setDefault("crdt", $answ->getCrdt());
            $this->tag->setDefault("crdtid", $answ->getCrdtId());
            $this->tag->setDefault("updt", $answ->getUpdt());
            $this->tag->setDefault("updtid", $answ->getUpdtId());
            $this->tag->setDefault("delmark", $answ->getDelmark());
            
        }
    }

    /**
     * Creates a new answ
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "answer",
                "action" => "index"
            ));
        }

        $answ = new Answ();

        $answ->setAnswId($this->request->getPost("answid"));
        $answ->setQuesId($this->request->getPost("quesid"));
        $answ->setUserId($this->request->getPost("userid"));
        $answ->setAgree($this->request->getPost("agree"));
        $answ->setRank($this->request->getPost("rank"));
        $answ->setComment($this->request->getPost("comment"));
        $answ->setInans($this->request->getPost("inans"));
        $answ->setRankId($this->request->getPost("rankid"));
        $answ->setChgreason($this->request->getPost("chgreason"));
        $answ->setChgcomment($this->request->getPost("chgcomment"));
        $answ->setCrdt($this->request->getPost("crdt"));
        $answ->setCrdtId($this->request->getPost("crdtid"));
        $answ->setUpdt($this->request->getPost("updt"));
        $answ->setUpdtId($this->request->getPost("updtid"));
        $answ->setDelmark($this->request->getPost("delmark"));
        

        if (!$answ->save()) {
            foreach ($answ->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "answer",
                "action" => "new"
            ));
        }

        $this->flash->success("answ was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "answer",
            "action" => "index"
        ));

    }

    /**
     * Saves a answ edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "answer",
                "action" => "index"
            ));
        }

        $answid = $this->request->getPost("answid");

        $answ = Answer::findFirstByAnswerId($answid);
        if (!$answ) {
            $this->flash->error("answer does not exist " . $answid);

            return $this->dispatcher->forward(array(
                "controller" => "answer",
                "action" => "index"
            ));
        }

        $answ->setAnswId($this->request->getPost("answid"));
        $answ->setQuesId($this->request->getPost("quesid"));
        $answ->setUserId($this->request->getPost("userid"));
        $answ->setAgree($this->request->getPost("agree"));
        $answ->setRank($this->request->getPost("rank"));
        $answ->setComment($this->request->getPost("comment"));
        $answ->setInans($this->request->getPost("inans"));
        $answ->setRankId($this->request->getPost("rankid"));
        $answ->setChgreason($this->request->getPost("chgreason"));
        $answ->setChgcomment($this->request->getPost("chgcomment"));
        $answ->setCrdt($this->request->getPost("crdt"));
        $answ->setCrdtId($this->request->getPost("crdtid"));
        $answ->setUpdt($this->request->getPost("updt"));
        $answ->setUpdtId($this->request->getPost("updtid"));
        $answ->setDelmark($this->request->getPost("delmark"));
        

        if (!$answ->save()) {

            foreach ($answ->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "answer",
                "action" => "edit",
                "params" => array($answ->answid)
            ));
        }

        $this->flash->success("answer was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "answer",
            "action" => "index"
        ));

    }

    /**
     * Deletes a answ
     *
     * @param string $answid
     */
    public function deleteAction($answid)
    {

        $answ = Answer::findFirstByAnswerId($answid);
        if (!$answ) {
            $this->flash->error("answer was not found");

            return $this->dispatcher->forward(array(
                "controller" => "answer",
                "action" => "index"
            ));
        }

        if (!$answ->delete()) {

            foreach ($answ->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "answer",
                "action" => "search"
            ));
        }

        $this->flash->success("answer was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "answer",
            "action" => "index"
        ));
    }

}
