<?php

class State{
  public $Id;
  public $Name;

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
     * Get the value of name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set the value of name
     *
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->Name = $name;

        return $this;
    }


    function insert(State $state){

        return "INSERT INTO states(id,name) VALUES ('".$state->getId()."','".$state->getName()."')";

    }

    function delete(State $state){

        return "DELETE FROM states WHERE id='".$state->getId()."'";

    }

    function update(State $state){

      return  "UPDATE states SET name='".$state->getName()."' WHERE id = '".$state->getId()."'";

    }

}

 ?>
