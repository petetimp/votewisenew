<?php
namespace VoteWise\QA\Controller;

use Phalcon\Tag as Tag;
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class RankController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for rank
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Rank", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "rankid";

        $rank = Rank::find($parameters);
        if (count($rank) == 0) {
            $this->flash->notice("The search did not find any rank");

            return $this->dispatcher->forward(array(
                "controller" => "rank",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $rank,
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
     * Edits a rank
     *
     * @param string $rankid
     */
    public function editAction($rankid)
    {

        if (!$this->request->isPost()) {

            $rank = Rank::findFirstByrankid($rankid);
            if (!$rank) {
                $this->flash->error("rank was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "rank",
                    "action" => "index"
                ));
            }

            $this->view->rankid = $rank->rankid;

            $this->tag->setDefault("rankid", $rank->getRankid());
            $this->tag->setDefault("userid", $rank->getUserid());
            $this->tag->setDefault("quesid", $rank->getQuesid());
            $this->tag->setDefault("crdt", $rank->getCrdt());
            $this->tag->setDefault("crdtid", $rank->getCrdtid());
            $this->tag->setDefault("updt", $rank->getUpdt());
            $this->tag->setDefault("updtid", $rank->getUpdtid());
            $this->tag->setDefault("delmark", $rank->getDelmark());
            
        }
    }

    /**
     * Creates a new rank
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "rank",
                "action" => "index"
            ));
        }

        $rank = new Rank();

        $rank->setRankid($this->request->getPost("rankid"));
        $rank->setUserid($this->request->getPost("userid"));
        $rank->setQuesid($this->request->getPost("quesid"));
        $rank->setCrdt($this->request->getPost("crdt"));
        $rank->setCrdtid($this->request->getPost("crdtid"));
        $rank->setUpdt($this->request->getPost("updt"));
        $rank->setUpdtid($this->request->getPost("updtid"));
        $rank->setDelmark($this->request->getPost("delmark"));
        

        if (!$rank->save()) {
            foreach ($rank->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "rank",
                "action" => "new"
            ));
        }

        $this->flash->success("rank was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "rank",
            "action" => "index"
        ));

    }

    /**
     * Saves a rank edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "rank",
                "action" => "index"
            ));
        }

        $rankid = $this->request->getPost("rankid");

        $rank = Rank::findFirstByrankid($rankid);
        if (!$rank) {
            $this->flash->error("rank does not exist " . $rankid);

            return $this->dispatcher->forward(array(
                "controller" => "rank",
                "action" => "index"
            ));
        }

        $rank->setRankid($this->request->getPost("rankid"));
        $rank->setUserid($this->request->getPost("userid"));
        $rank->setQuesid($this->request->getPost("quesid"));
        $rank->setCrdt($this->request->getPost("crdt"));
        $rank->setCrdtid($this->request->getPost("crdtid"));
        $rank->setUpdt($this->request->getPost("updt"));
        $rank->setUpdtid($this->request->getPost("updtid"));
        $rank->setDelmark($this->request->getPost("delmark"));
        

        if (!$rank->save()) {

            foreach ($rank->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "rank",
                "action" => "edit",
                "params" => array($rank->rankid)
            ));
        }

        $this->flash->success("rank was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "rank",
            "action" => "index"
        ));

    }

    /**
     * Deletes a rank
     *
     * @param string $rankid
     */
    public function deleteAction($rankid)
    {

        $rank = Rank::findFirstByrankid($rankid);
        if (!$rank) {
            $this->flash->error("rank was not found");

            return $this->dispatcher->forward(array(
                "controller" => "rank",
                "action" => "index"
            ));
        }

        if (!$rank->delete()) {

            foreach ($rank->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "rank",
                "action" => "search"
            ));
        }

        $this->flash->success("rank was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "rank",
            "action" => "index"
        ));
    }

}
