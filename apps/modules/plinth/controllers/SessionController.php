<?php
namespace Plinth\Controllers;

use Phalcon\Tag as Tag;
use VoteWise\VW\Models\User;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Db\RawValue;

class SessionController extends ControllerBase
{

	public function initialize()
    {
        $this->view->setTemplateAfter('main');
        Tag::setTitle('Sign In');
        parent::initialize();
    }

    public function indexAction()
    {
        if (!$this->request->isPost()) {
            Tag::setDefault('email', 'strimble@softyme.com');
            Tag::setDefault('password', 'phalcon');
        }
    }

    public function registerAction()
    {
        $request = $this->request;
        if ($request->isPost()) {

            $firstname = $request->getPost('firstname', array('string', 'striptags'));
			$lastname = $request->getPost('lastname', array('string', 'striptags'));
            $username = $request->getPost('username', 'alphanum');
            $email = $request->getPost('email', 'email');
            $password = $request->getPost('password');
            $repeatPassword = $this->request->getPost('repeatPassword');

            if ($password != $repeatPassword) {
                $this->flash->error('Passwords are diferent');
                return false;
            }

            $user = new User();
            $user->setUname($username);
            $user->setPwd(sha1($password));
            $user->setFname($firstname);
			$user->setLname($lastname);
            $user->setEmail($email);
            $user->setCrdt(new RawValue('now()')); 
            $user->setActive('1');
            if ($user->save() == false) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                Tag::setDefault('email', '');
                Tag::setDefault('password', '');
                $this->flash->success('Thanks for signing up, please log-in
				to start generating invoices');
                return $this->forward('session/index');
            }
        }
    }

    /**
     * Register authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession($user)
    {
        	$this->session->set('auth', array(
            	'id' => $user->getUserid(),
            	'name' => $user->getUname()
        	));
    }

    /**
     * This actions receive the input from the login form
     *
     */
    public function startAction()
    {
		if ($this->request->isPost() && (isset($_POST['email'])) && isset($_POST['password'])) {
			
			$email = $this->request->getPost('email', 'email');
			$password = $this->request->getPost('password');
            $password = sha1($password);
			
			$query = Criteria::fromInput($this->di, "VoteWise\VW\Models\User", $_POST);
			$this->persistent->parameters = $query->getParams();
			$parameters = $this->persistent->parameters;
	
			if (!is_array($parameters)) {
				$parameters = array();
			}
			
			$users = User::find($parameters);
			
			if (count($users) == 1) {
				$user = $users->getFirst();
				if (($user->getEmail() == $email || $user->getUname() == $email) && sha1($user->getPwd()) == $password){
					if ($this->session->has('auth')){
						$this->flashSess->notice("<div class='messageText'>'You are already logged in as '" . $user->getUname() . 
						"'<br/><a href='../votewise/session/end'> Log Out</a></div>");
						
					}else{
						$this->_registerSession($user);
						$this->flashSess->success('<div class="messageText">Welcome ' . $user->getUname() . ".</div>");	
					}
					$this->response->redirect("");
				} else {
					$this->flashSess->error('<div class="messageText">Wrong email/password<div/>');
					$this->response->redirect("session");
				}
			}
		}
		/*
        if ($this->request->isPost()) {
            $email = $this->request->getPost('email', 'email');

            $password = $this->request->getPost('password');
            $password = sha1($password);

            $user = User::find("email='$email' AND pwd='$password' AND active='1'");
            if ($user != false) {
                $this->_registerSession($user);
                $this->flash->success('Welcome ' . $user->getUname());
                return $this->forward('who/index');
            }
			
            $username = $this->request->getPost('email', 'alphanum');
            $user = User::find("uname='$username' AND pwd='$password' AND active='1'");
            if ($user != false) {
                $this->_registerSession($user);
                $this->flash->success('Welcome ' . $user->getUname());
                return $this->forward('who/index');
            }

            $this->flash->error('Wrong email/password');
        }

        return $this->forward('session/index'); */
    } 

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction()
    {
		$this->flashSess->success('<div class="messageText">Goodbye '. $this->session->get('auth')['name'] . '!
		You have been logged out.</div>');
        $this->session->remove('auth');
        
        return $this->response->redirect("");
    }
}


