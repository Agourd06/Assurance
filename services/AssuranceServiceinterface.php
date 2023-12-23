<?php
interface AssuranceServiceinterface{

    public function addAssurance(assurance $assurance);
    public function DeleteAssurance($id);
    public function editingAssurance($id);
    public function UpdateAssurance(assurance $assurance,$id);
    public function ShowAssurance();

}
?>