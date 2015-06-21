<?php
namespace Plinth\Controllers;

use Phalcon\Tag as Tag;
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class UserController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for user
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "User", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "userid";

        $user = User::find($parameters);
        if (count($user) == 0) {
            $this->flash->notice("The search did not find any user");

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $user,
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
     * Edits a user
     *
     * @param string $userid
     */
    public function editAction($userid)
    {

        if (!$this->request->isPost()) {

            $user = User::findFirstByuserid($userid);
            if (!$user) {
                $this->flash->error("user was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "user",
                    "action" => "index"
                ));
            }

            $this->view->userid = $user->userid;

            $this->tag->setDefault("userid", $user->getUserid());
            $this->tag->setDefault("uname", $user->getUname());
            $this->tag->setDefault("pwd", $user->getPwd());
            $this->tag->setDefault("email", $user->getEmail());
            $this->tag->setDefault("phone", $user->getPhone());
            $this->tag->setDefault("bname", $user->getBname());
            $this->tag->setDefault("fname", $user->getFname());
            $this->tag->setDefault("lname", $user->getLname());
            $this->tag->setDefault("utype", $user->getUtype());
            $this->tag->setDefault("ulevel", $user->getUlevel());
            $this->tag->setDefault("active", $user->getActive());
            $this->tag->setDefault("crdt", $user->getCrdt());
            $this->tag->setDefault("crdtid", $user->getCrdtid());
            $this->tag->setDefault("updt", $user->getUpdt());
            $this->tag->setDefault("updtid", $user->getUpdtid());
            $this->tag->setDefault("delmark", $user->getDelmark());
            
        }
    }

    /**
     * Creates a new user
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }

        $user = new User();

        $user->setUserid($this->request->getPost("userid"));
        $user->setUname($this->request->getPost("uname"));
        $user->setPwd($this->request->getPost("pwd"));
        $user->setEmail($this->request->getPost("email", "email"));
        $user->setPhone($this->request->getPost("phone"));
        $user->setBname($this->request->getPost("bname"));
        $user->setFname($this->request->getPost("fname"));
        $user->setLname($this->request->getPost("lname"));
        $user->setUtype($this->request->getPost("utype"));
        $user->setUlevel($this->request->getPost("ulevel"));
        $user->setActive($this->request->getPost("active"));
        $user->setCrdt($this->request->getPost("crdt"));
        $user->setCrdtid($this->request->getPost("crdtid"));
        $user->setUpdt($this->request->getPost("updt"));
        $user->setUpdtid($this->request->getPost("updtid"));
        $user->setDelmark($this->request->getPost("delmark"));
        

        if (!$user->save()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "new"
            ));
        }

        $this->flash->success("user was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "user",
            "action" => "index"
        ));

    }

    /**
     * Saves a user edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }

        $userid = $this->request->getPost("userid");

        $user = User::findFirstByuserid($userid);
        if (!$user) {
            $this->flash->error("user does not exist " . $userid);

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }

        $user->setUserid($this->request->getPost("userid"));
        $user->setUname($this->request->getPost("uname"));
        $user->setPwd($this->request->getPost("pwd"));
        $user->setEmail($this->request->getPost("email", "email"));
        $user->setPhone($this->request->getPost("phone"));
        $user->setBname($this->request->getPost("bname"));
        $user->setFname($this->request->getPost("fname"));
        $user->setLname($this->request->getPost("lname"));
        $user->setUtype($this->request->getPost("utype"));
        $user->setUlevel($this->request->getPost("ulevel"));
        $user->setActive($this->request->getPost("active"));
        $user->setCrdt($this->request->getPost("crdt"));
        $user->setCrdtid($this->request->getPost("crdtid"));
        $user->setUpdt($this->request->getPost("updt"));
        $user->setUpdtid($this->request->getPost("updtid"));
        $user->setDelmark($this->request->getPost("delmark"));
        

        if (!$user->save()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "edit",
                "params" => array($user->userid)
            ));
        }

        $this->flash->success("user was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "user",
            "action" => "index"
        ));

    }

    /**
     * Deletes a user
     *
     * @param string $userid
     */
    public function deleteAction($userid)
    {

        $user = User::findFirstByuserid($userid);
        if (!$user) {
            $this->flash->error("user was not found");

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "search"
            ));
        }

        $this->flash->success("user was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "user",
            "action" => "index"
        ));
    }

}
