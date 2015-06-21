<?php

class Answ extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $answid;

    /**
     *
     * @var string
     */
    protected $quesid;

    /**
     *
     * @var string
     */
    protected $userid;

    /**
     *
     * @var string
     */
    protected $agree;

    /**
     *
     * @var string
     */
    protected $rank;

    /**
     *
     * @var string
     */
    protected $comment;

    /**
     *
     * @var string
     */
    protected $inans;

    /**
     *
     * @var string
     */
    protected $rankid;

    /**
     *
     * @var string
     */
    protected $chgreason;

    /**
     *
     * @var string
     */
    protected $chgcomment;

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
     * Method to set the value of field answid
     *
     * @param string $answid
     * @return $this
     */
    public function setAnswid($answid)
    {
        $this->answid = $answid;

        return $this;
    }

    /**
     * Method to set the value of field quesid
     *
     * @param string $quesid
     * @return $this
     */
    public function setQuesid($quesid)
    {
        $this->quesid = $quesid;

        return $this;
    }

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
     * Method to set the value of field agree
     *
     * @param string $agree
     * @return $this
     */
    public function setAgree($agree)
    {
        $this->agree = $agree;

        return $this;
    }

    /**
     * Method to set the value of field rank
     *
     * @param string $rank
     * @return $this
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Method to set the value of field comment
     *
     * @param string $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Method to set the value of field inans
     *
     * @param string $inans
     * @return $this
     */
    public function setInans($inans)
    {
        $this->inans = $inans;

        return $this;
    }

    /**
     * Method to set the value of field rankid
     *
     * @param string $rankid
     * @return $this
     */
    public function setRankid($rankid)
    {
        $this->rankid = $rankid;

        return $this;
    }

    /**
     * Method to set the value of field chgreason
     *
     * @param string $chgreason
     * @return $this
     */
    public function setChgreason($chgreason)
    {
        $this->chgreason = $chgreason;

        return $this;
    }

    /**
     * Method to set the value of field chgcomment
     *
     * @param string $chgcomment
     * @return $this
     */
    public function setChgcomment($chgcomment)
    {
        $this->chgcomment = $chgcomment;

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
     * Returns the value of field answid
     *
     * @return string
     */
    public function getAnswid()
    {
        return $this->answid;
    }

    /**
     * Returns the value of field quesid
     *
     * @return string
     */
    public function getQuesid()
    {
        return $this->quesid;
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
     * Returns the value of field agree
     *
     * @return string
     */
    public function getAgree()
    {
        return $this->agree;
    }

    /**
     * Returns the value of field rank
     *
     * @return string
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Returns the value of field comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Returns the value of field inans
     *
     * @return string
     */
    public function getInans()
    {
        return $this->inans;
    }

    /**
     * Returns the value of field rankid
     *
     * @return string
     */
    public function getRankid()
    {
        return $this->rankid;
    }

    /**
     * Returns the value of field chgreason
     *
     * @return string
     */
    public function getChgreason()
    {
        return $this->chgreason;
    }

    /**
     * Returns the value of field chgcomment
     *
     * @return string
     */
    public function getChgcomment()
    {
        return $this->chgcomment;
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

}
