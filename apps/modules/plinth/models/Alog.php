<?php

class Alog extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $alogid;

    /**
     *
     * @var string
     */
    protected $tname;

    /**
     *
     * @var string
     */
    protected $aed;

    /**
     *
     * @var string
     */
    protected $changes;

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
     * Method to set the value of field alogid
     *
     * @param string $alogid
     * @return $this
     */
    public function setAlogid($alogid)
    {
        $this->alogid = $alogid;

        return $this;
    }

    /**
     * Method to set the value of field tname
     *
     * @param string $tname
     * @return $this
     */
    public function setTname($tname)
    {
        $this->tname = $tname;

        return $this;
    }

    /**
     * Method to set the value of field aed
     *
     * @param string $aed
     * @return $this
     */
    public function setAed($aed)
    {
        $this->aed = $aed;

        return $this;
    }

    /**
     * Method to set the value of field changes
     *
     * @param string $changes
     * @return $this
     */
    public function setChanges($changes)
    {
        $this->changes = $changes;

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
     * Returns the value of field alogid
     *
     * @return string
     */
    public function getAlogid()
    {
        return $this->alogid;
    }

    /**
     * Returns the value of field tname
     *
     * @return string
     */
    public function getTname()
    {
        return $this->tname;
    }

    /**
     * Returns the value of field aed
     *
     * @return string
     */
    public function getAed()
    {
        return $this->aed;
    }

    /**
     * Returns the value of field changes
     *
     * @return string
     */
    public function getChanges()
    {
        return $this->changes;
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
