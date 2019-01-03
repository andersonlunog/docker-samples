<?php  
namespace Aplicacao\Factories;
  
interface MQManagerInterface { 
   public  function publish($message); 
   public  function get();
   public function startReceive();
}  