<?php

class Ques extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $quesid;

    /**
     *
     * @var string
     */
    protected $desc;

    /**
     *
     * @var string
     */
    protected $order;

    /**
     *
     * @var string
     */
    protected $bkgrid;

    /**
     *
     * @var integer
     */
    protected $qtype;

    /**
     *
     * @var string
     */
    protected $amttext;

    /**
     *
     * @var string
     */
    protected $amttype;

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
     * Method to set the value of field quesid
     *
     * @param string $quesid
     * @return $this
     */
    public function setQuesId($quesid)
    {
        $this->quesid = $quesid;

        return $this;
    }

    /**
     * Method to set the value of field desc
     *
     * @param string $desc
     * @return $this
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Method to set the value of field order
     *
     * @param string $order
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Method to set the value of field bkgrid
     *
     * @param string $bkgrid
     * @return $this
     */
    public function setBkgrId($bkgrid)
    {
        $this->bkgrid = $bkgrid;

        return $this;
    }

    /**
     * Method to set the value of field qtype
     *
     * @param integer $qtype
     * @return $this
     */
    public function setQtype($qtype)
    {
        $this->qtype = $qtype;

        return $this;
    }

    /**
     * Method to set the value of field amttext
     *
     * @param string $amttext
     * @return $this
     */
    public function setAmtText($amttext)
    {
        $this->amttext = $amttext;

        return $this;
    }

    /**
     * Method to set the value of field amttype
     *
     * @param string $amttype
     * @return $this
     */
    public function setAmtType($amttype)
    {
        $this->amttype = $amttype;

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
    public function setCrdtId($crdtid)
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
    public function setUpdtId($updtid)
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
     * Returns the value of field quesid
     *
     * @return string
     */
    public function getQuesId()
    {
        return $this->quesid;
    }

    /**
     * Returns the value of field desc
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Returns the value of field order
     *
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Returns the value of field bkgrid
     *
     * @return string
     */
    public function getBkgrId()
    {
        return $this->bkgrid;
    }

    /**
     * Returns the value of field qtype
     *
     * @return integer
     */
    public function getQtype()
    {
        return $this->qtype;
    }

    /**
     * Returns the value of field amttext
     *
     * @return string
     */
    public function getAmtText()
    {
        return $this->amttext;
    }

    /**
     * Returns the value of field amttype
     *
     * @return string
     */
    public function getAmtType()
    {
        return $this->amttype;
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
    public function getCrdtId()
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
    public function getUpdtId()
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
