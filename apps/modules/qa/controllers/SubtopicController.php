<?php
namespace VoteWise\QA\Controller;

use Phalcon\Tag as Tag;
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class SubTopicController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
        //NAVIGATION HERE:
        $this->view->setTemplateAfter('main');
    }

    public function subtopicAction()
    {
        Tag::setTitle('Voter Concerns');
        $this->persistent->parameters = null;
        //NAVIGATION HERE:
        $this->view->setTemplateAfter('main');
    }

    /**
     * Searches for topic
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Topic", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "topcid";

        $topc = Topc::find($parameters);
        if (count($topc) == 0) {
            $this->flash->notice("The search did not find any topic");

            return $this->dispatcher->forward(array(
                "controller" => "topic",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $topc,
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
     * Edits a topic
     *
     * @param string $topcid
     */
    public function editAction($topcid)
    {

        if (!$this->request->isPost()) {

            $topc = Topc::findFirstBytopcid($topcid);
            if (!$topc) {
                $this->flash->error("topic was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "topic",
                    "action" => "index"
                ));
            }

            $this->view->topcid = $topc->topcid;

            $this->tag->setDefault("topcid", $topc->getTopcid());
            $this->tag->setDefault("desc", $topc->getDesc());
            $this->tag->setDefault("stop", $topc->getStop());
            $this->tag->setDefault("order", $topc->getOrder());
            $this->tag->setDefault("crdt", $topc->getCrdt());
            $this->tag->setDefault("crdtid", $topc->getCrdtid());
            $this->tag->setDefault("updt", $topc->getUpdt());
            $this->tag->setDefault("updtid", $topc->getUpdtid());
            $this->tag->setDefault("delmark", $topc->getDelmark());
            
        }
    }

    /**
     * Creates a new topc
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "topic",
                "action" => "index"
            ));
        }

        $topc = new Topc();

        $topc->setTopcid($this->request->getPost("topcid"));
        $topc->setDesc($this->request->getPost("desc"));
        $topc->setStop($this->request->getPost("stop"));
        $topc->setOrder($this->request->getPost("order"));
        $topc->setCrdt($this->request->getPost("crdt"));
        $topc->setCrdtid($this->request->getPost("crdtid"));
        $topc->setUpdt($this->request->getPost("updt"));
        $topc->setUpdtid($this->request->getPost("updtid"));
        $topc->setDelmark($this->request->getPost("delmark"));
        

        if (!$topc->save()) {
            foreach ($topc->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "topic",
                "action" => "new"
            ));
        }

        $this->flash->success("topic was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "topic",
            "action" => "index"
        ));

    }

    /**
     * Saves a topic edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "topic",
                "action" => "index"
            ));
        }

        $topcid = $this->request->getPost("topcid");

        $topc = Topc::findFirstBytopcid($topcid);
        if (!$topc) {
            $this->flash->error("topic does not exist " . $topcid);

            return $this->dispatcher->forward(array(
                "controller" => "topic",
                "action" => "index"
            ));
        }

        $topc->setTopcid($this->request->getPost("topcid"));
        $topc->setDesc($this->request->getPost("desc"));
        $topc->setStop($this->request->getPost("stop"));
        $topc->setOrder($this->request->getPost("order"));
        $topc->setCrdt($this->request->getPost("crdt"));
        $topc->setCrdtid($this->request->getPost("crdtid"));
        $topc->setUpdt($this->request->getPost("updt"));
        $topc->setUpdtid($this->request->getPost("updtid"));
        $topc->setDelmark($this->request->getPost("delmark"));
        

        if (!$topc->save()) {

            foreach ($topc->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "topic",
                "action" => "edit",
                "params" => array($topc->topcid)
            ));
        }

        $this->flash->success("topc was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "topic",
            "action" => "index"
        ));

    }

    /**
     * Deletes a topc
     *
     * @param string $topcid
     */
    public function deleteAction($topcid)
    {

        $topc = Topc::findFirstBytopcid($topcid);
        if (!$topc) {
            $this->flash->error("topic was not found");

            return $this->dispatcher->forward(array(
                "controller" => "topic",
                "action" => "index"
            ));
        }

        if (!$topc->delete()) {

            foreach ($topc->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "topic",
                "action" => "search"
            ));
        }

        $this->flash->success("topic was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "topic",
            "action" => "index"
        ));
    }

}
