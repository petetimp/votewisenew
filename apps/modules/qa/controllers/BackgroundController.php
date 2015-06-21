<?php
namespace VoteWise\QA\Controller;

use Phalcon\Tag as Tag;
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BackgroundController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
        $this->view->setTemplateAfter('main');
        Tag::setTitle('Background');
    }

    /**
     * Searches for bkgr
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Bkgr", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "bkgrid";

        $bkgr = Bkgr::find($parameters);
        if (count($bkgr) == 0) {
            $this->flash->notice("The search did not find any bkgr");

            return $this->dispatcher->forward(array(
                "controller" => "background",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $bkgr,
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
     * Edits a bkgr
     *
     * @param string $bkgrid
     */
    public function editAction($bkgrid)
    {

        if (!$this->request->isPost()) {

            $bkgr = Bkgr::findFirstBybkgrid($bkgrid);
            if (!$bkgr) {
                $this->flash->error("bkgr was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "background",
                    "action" => "index"
                ));
            }

            $this->view->bkgrid = $bkgr->bkgrid;

            $this->tag->setDefault("bkgrid", $bkgr->getBkgrid());
            $this->tag->setDefault("desc", $bkgr->getDesc());
            $this->tag->setDefault("crdt", $bkgr->getCrdt());
            $this->tag->setDefault("crdtid", $bkgr->getCrdtid());
            $this->tag->setDefault("updt", $bkgr->getUpdt());
            $this->tag->setDefault("updtid", $bkgr->getUpdtid());
            $this->tag->setDefault("delmark", $bkgr->getDelmark());
            
        }
    }

    /**
     * Creates a new bkgr
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "background",
                "action" => "index"
            ));
        }

        $bkgr = new Bkgr();

        $bkgr->setBkgrid($this->request->getPost("bkgrid"));
        $bkgr->setDesc($this->request->getPost("desc"));
        $bkgr->setCrdt($this->request->getPost("crdt"));
        $bkgr->setCrdtid($this->request->getPost("crdtid"));
        $bkgr->setUpdt($this->request->getPost("updt"));
        $bkgr->setUpdtid($this->request->getPost("updtid"));
        $bkgr->setDelmark($this->request->getPost("delmark"));
        

        if (!$bkgr->save()) {
            foreach ($bkgr->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "background",
                "action" => "new"
            ));
        }

        $this->flash->success("bkgr was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "background",
            "action" => "index"
        ));

    }

    /**
     * Saves a bkgr edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "background",
                "action" => "index"
            ));
        }

        $bkgrid = $this->request->getPost("bkgrid");

        $bkgr = Bkgr::findFirstBybkgrid($bkgrid);
        if (!$bkgr) {
            $this->flash->error("bkgr does not exist " . $bkgrid);

            return $this->dispatcher->forward(array(
                "controller" => "background",
                "action" => "index"
            ));
        }

        $bkgr->setBkgrid($this->request->getPost("bkgrid"));
        $bkgr->setDesc($this->request->getPost("desc"));
        $bkgr->setCrdt($this->request->getPost("crdt"));
        $bkgr->setCrdtid($this->request->getPost("crdtid"));
        $bkgr->setUpdt($this->request->getPost("updt"));
        $bkgr->setUpdtid($this->request->getPost("updtid"));
        $bkgr->setDelmark($this->request->getPost("delmark"));
        

        if (!$bkgr->save()) {

            foreach ($bkgr->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "background",
                "action" => "edit",
                "params" => array($bkgr->bkgrid)
            ));
        }

        $this->flash->success("bkgr was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "background",
            "action" => "index"
        ));

    }

    /**
     * Deletes a bkgr
     *
     * @param string $bkgrid
     */
    public function deleteAction($bkgrid)
    {

        $bkgr = Bkgr::findFirstBybkgrid($bkgrid);
        if (!$bkgr) {
            $this->flash->error("bkgr was not found");

            return $this->dispatcher->forward(array(
                "controller" => "background",
                "action" => "index"
            ));
        }

        if (!$bkgr->delete()) {

            foreach ($bkgr->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "background",
                "action" => "search"
            ));
        }

        $this->flash->success("background was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "background",
            "action" => "index"
        ));
    }

}
