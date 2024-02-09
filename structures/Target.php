<?php

class Target{
  public $Id;
  public $Target;
  public $Indicator;
  public $Nature;
  public $Source;
  public $TargetValue;

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed $Id
     *
     * @return self
     */
    public function setId($Id)
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * Get the value of target
     *
     * @return mixed
     */
    public function getTarget()
    {
        return $this->Target;
    }

    /**
     * Set the value of target
     *
     * @param mixed $target
     *
     * @return self
     */
    public function setTarget($target)
    {
        $this->Target = $target;

        return $this;
    }

    /**
     * Get the value of Indicator
     *
     * @return mixed
     */
    public function getIndicator()
    {
        return $this->Indicator;
    }

    /**
     * Set the value of To Indicator
     *
     * @param mixed $Indicator
     *
     * @return self
     */
    public function setIndicator($Indicator)
    {
        $this->Indicator = $Indicator;

        return $this;
    }
	
	
    /**
     * Get the value of Indicator
     *
     * @return mixed
     */
    public function getNature()
    {
        return $this->Nature;
    }

    /**
     * Set the value of To Indicator
     *
     * @param mixed $Indicator
     *
     * @return self
     */
    public function setNature($nature)
    {
        $this->Nature = $nature;

        return $this;
    }
	
	/**
     * Get the value of IndicatorValue
     *
     * @return mixed
     */
    public function getIndicatorValue()
    {
        return $this->IndicatorValue;
    }

    /**
     * Set the value of To IndicatorValue
     *
     * @param mixed $IndicatorValue
     *
     * @return self
     */
    public function setIndicatorValue($indicatorvalue)
    {
        $this->IndicatorValue = $indicatorvalue;

        return $this;
    }
	
	/**
     * Get the value of Source
     *
     * @return mixed
     */
    public function getSource()
    {
        return $this->Source;
    }

    /**
     * Set the value of To Source
     *
     * @param mixed $Source
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->Source = $source;

        return $this;
    }

    function insert(Target $target){

        return "INSERT INTO targets(id,target,indicator,nature,source,indicatorvalue) VALUES ('".$target->getId()."','".$target->getTarget()."','".$target->getIndicator()."','".$target->getNature()."','".$target->getSource()."','".$target->getIndicatorValue()."')";

    }

    function delete(Target $target){

        return "DELETE FROM targets WHERE id='".$target->getId()."'";

    }

    function update(Target $target){

      return  "UPDATE targets SET target='".$target->getTarget()."',indicator = '".$target->getIndicator()."',nature = '".$target->getNature()."',source = '".$target->getSource()."',indicatorvalue = '".$target->getIndicatorValue()."' WHERE id = '".$target->getId()."'";

    }

}

 ?>
