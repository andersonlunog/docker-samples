<?php  
namespace Aplicacao\Factories;
  
interface MQManagerInterface { 
   public  function publish($channel, $message); 
   public  function get();
   public function startReceive($channel, $callback);
}  