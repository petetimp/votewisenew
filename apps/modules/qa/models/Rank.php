<?php

class Rank extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $rankid;

    /**
     *
     * @var string
     */
    protected $userid;

    /**
     *
     * @var string
     */
    protected $quesid;

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
     * Returns the value of field rankid
     *
     * @return string
     */
    public function getRankid()
    {
        return $this->rankid;
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
     * Returns the value of field quesid
     *
     * @return string
     */
    public function getQuesid()
    {
        return $this->quesid;
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
