<?php
namespace VoteWise\QA\Models;

use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model;

class User extends Model
{

    /**
     *
     * @var string
     */
    protected $userid;

    /**
     *
     * @var string
     */
    protected $uname;

    /**
     *
     * @var string
     */
    protected $pwd;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $phone;

    /**
     *
     * @var string
     */
    protected $bname;

    /**
     *
     * @var string
     */
    protected $fname;

    /**
     *
     * @var string
     */
    protected $lname;

    /**
     *
     * @var string
     */
    protected $utype;

    /**
     *
     * @var string
     */
    protected $ulevel;

    /**
     *
     * @var string
     */
    protected $active;

    /**
     *
     * @var string
     */
    protected $crdt;

    /**
     *
     * @var string
     */
    protected $crdtid;

    /**
     *
     * @var string
     */
    protected $updt;

    /**
     *
     * @var string
     */
    protected $updtid;

    /**
     *
     * @var string
     */
    protected $delmark;

    /**
     * Method to set the value of field userid
     *
     * @param string $userid
     * @return $this
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Method to set the value of field uname
     *
     * @param string $uname
     * @return $this
     */
    public function setUname($uname)
    {
        $this->uname = $uname;

        return $this;
    }

    /**
     * Method to set the value of field pwd
     *
     * @param string $pwd
     * @return $this
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Method to set the value of field bname
     *
     * @param string $bname
     * @return $this
     */
    public function setBname($bname)
    {
        $this->bname = $bname;

        return $this;
    }

    /**
     * Method to set the value of field fname
     *
     * @param string $fname
     * @return $this
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Method to set the value of field lname
     *
     * @param string $lname
     * @return $this
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Method to set the value of field utype
     *
     * @param string $utype
     * @return $this
     */
    public function setUtype($utype)
    {
        $this->utype = $utype;

        return $this;
    }

    /**
     * Method to set the value of field ulevel
     *
     * @param string $ulevel
     * @return $this
     */
    public function setUlevel($ulevel)
    {
        $this->ulevel = $ulevel;

        return $this;
    }

    /**
     * Method to set the value of field active
     *
     * @param string $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Method to set the value of field crdt
     *
     * @param string $crdt
     * @return $this
     */
    public function setCrdt($crdt)
    {
        $this->crdt = $crdt;

        return $this;
    }

    /**
     * Method to set the value of field crdtid
     *
     * @param string $crdtid
     * @return $this
     */
    public function setCrdtid($crdtid)
    {
        $this->crdtid = $crdtid;

        return $this;
    }

    /**
     * Method to set the value of field updt
     *
     * @param string $updt
     * @return $this
     */
    public function setUpdt($updt)
    {
        $this->updt = $updt;

        return $this;
    }

    /**
     * Method to set the value of field updtid
     *
     * @param string $updtid
     * @return $this
     */
    public function setUpdtid($updtid)
    {
        $this->updtid = $updtid;

        return $this;
    }

    /**
     * Method to set the value of field delmark
     *
     * @param string $delmark
     * @return $this
     */
    public function setDelmark($delmark)
    {
        $this->delmark = $delmark;

        return $this;
    }

    /**
     * Returns the value of field userid
     *
     * @return string
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Returns the value of field uname
     *
     * @return string
     */
    public function getUname()
    {
        return $this->uname;
    }

    /**
     * Returns the value of field pwd
     *
     * @return string
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Returns the value of field bname
     *
     * @return string
     */
    public function getBname()
    {
        return $this->bname;
    }

    /**
     * Returns the value of field fname
     *
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Returns the value of field lname
     *
     * @return string
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Returns the value of field utype
     *
     * @return string
     */
    public function getUtype()
    {
        return $this->utype;
    }

    /**
     * Returns the value of field ulevel
     *
     * @return string
     */
    public function getUlevel()
    {
        return $this->ulevel;
    }

    /**
     * Returns the value of field active
     *
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Returns the value of field crdt
     *
     * @return string
     */
    public function getCrdt()
    {
        return $this->crdt;
    }

    /**
     * Returns the value of field crdtid
     *
     * @return string
     */
    public function getCrdtid()
    {
        return $this->crdtid;
    }

    /**
     * Returns the value of field updt
     *
     * @return string
     */
    public function getUpdt()
    {
        return $this->updt;
    }

    /**
     * Returns the value of field updtid
     *
     * @return string
     */
    public function getUpdtid()
    {
        return $this->updtid;
    }

    /**
     * Returns the value of field delmark
     *
     * @return string
     */
    public function getDelmark()
    {
        return $this->delmark;
    }

    /**
     * Validations and business logic
     */
    public function validation()
    {

        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }
}
