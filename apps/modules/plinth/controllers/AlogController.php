<?php
namespace Plinth\Controllers;

use Phalcon\Tag as Tag;
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AlogController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for alog
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Alog", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "alogid";

        $alog = Alog::find($parameters);
        if (count($alog) == 0) {
            $this->flash->notice("The search did not find any alog");

            return $this->dispatcher->forward(array(
                "controller" => "alog",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $alog,
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
     * Edits a alog
     *
     * @param string $alogid
     */
    public function editAction($alogid)
    {

        if (!$this->request->isPost()) {

            $alog = Alog::findFirstByalogid($alogid);
            if (!$alog) {
                $this->flash->error("alog was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "alog",
                    "action" => "index"
                ));
            }

            $this->view->alogid = $alog->alogid;

            $this->tag->setDefault("alogid", $alog->getAlogid());
            $this->tag->setDefault("tname", $alog->getTname());
            $this->tag->setDefault("aed", $alog->getAed());
            $this->tag->setDefault("changes", $alog->getChanges());
            $this->tag->setDefault("crdt", $alog->getCrdt());
            $this->tag->setDefault("crdtid", $alog->getCrdtid());
            $this->tag->setDefault("updt", $alog->getUpdt());
            $this->tag->setDefault("updtid", $alog->getUpdtid());
            $this->tag->setDefault("delmark", $alog->getDelmark());
            
        }
    }

    /**
     * Creates a new alog
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "alog",
                "action" => "index"
            ));
        }

        $alog = new Alog();

        $alog->setAlogid($this->request->getPost("alogid"));
        $alog->setTname($this->request->getPost("tname"));
        $alog->setAed($this->request->getPost("aed"));
        $alog->setChanges($this->request->getPost("changes"));
        $alog->setCrdt($this->request->getPost("crdt"));
        $alog->setCrdtid($this->request->getPost("crdtid"));
        $alog->setUpdt($this->request->getPost("updt"));
        $alog->setUpdtid($this->request->getPost("updtid"));
        $alog->setDelmark($this->request->getPost("delmark"));
        

        if (!$alog->save()) {
            foreach ($alog->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "alog",
                "action" => "new"
            ));
        }

        $this->flash->success("alog was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "alog",
            "action" => "index"
        ));

    }

    /**
     * Saves a alog edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "alog",
                "action" => "index"
            ));
        }

        $alogid = $this->request->getPost("alogid");

        $alog = Alog::findFirstByalogid($alogid);
        if (!$alog) {
            $this->flash->error("alog does not exist " . $alogid);

            return $this->dispatcher->forward(array(
                "controller" => "alog",
                "action" => "index"
            ));
        }

        $alog->setAlogid($this->request->getPost("alogid"));
        $alog->setTname($this->request->getPost("tname"));
        $alog->setAed($this->request->getPost("aed"));
        $alog->setChanges($this->request->getPost("changes"));
        $alog->setCrdt($this->request->getPost("crdt"));
        $alog->setCrdtid($this->request->getPost("crdtid"));
        $alog->setUpdt($this->request->getPost("updt"));
        $alog->setUpdtid($this->request->getPost("updtid"));
        $alog->setDelmark($this->request->getPost("delmark"));
        

        if (!$alog->save()) {

            foreach ($alog->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "alog",
                "action" => "edit",
                "params" => array($alog->alogid)
            ));
        }

        $this->flash->success("alog was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "alog",
            "action" => "index"
        ));

    }

    /**
     * Deletes a alog
     *
     * @param string $alogid
     */
    public function deleteAction($alogid)
    {

        $alog = Alog::findFirstByalogid($alogid);
        if (!$alog) {
            $this->flash->error("alog was not found");

            return $this->dispatcher->forward(array(
                "controller" => "alog",
                "action" => "index"
            ));
        }

        if (!$alog->delete()) {

            foreach ($alog->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "alog",
                "action" => "search"
            ));
        }

        $this->flash->success("alog was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "alog",
            "action" => "index"
        ));
    }

}
