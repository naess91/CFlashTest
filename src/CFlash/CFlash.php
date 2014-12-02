<?php
namespace CFlashTest\CFlash;

 
class CFlash
{

    private $sessionVariable = 'CFlash';
   

    private $session = null;
    

    private $allMessages = null;
    
        
    public function __construct($session) 
    {
   
        $this->session = $session;
        if($this->session->has($this->sessionVariable))
        {
            $this->retrieveMessages();
        }
    }

 private function addMessage($message, $type)
    {
        $statusMessage = ['type' => $type, 'message' => $message];
        if(is_null($this->allMessages))
        {
            $this->allMessages = array();
        }
        array_push($this->allMessages, $statusMessage);
        $this->session->set($this->sessionVariable, $this->allMessages);
    }


	
	     public function CustomMessage($message, $type)
    {
        $this->addMessage($message, $type);
    }
    
    public function isEmpty() 
    {
        if(is_null($this->allMessages))
        {
            return true;
        }
        return false;
    }

    public function deleteMessages()
    {
            $this->session->set($this->sessionVariable, null);
            $this->getMessages();
    }
 
    public function getMessages()
    {
        $this->allMessages = $this->session->get($this->sessionVariable);
    }
  
  
 public function displayFlashMessages()
    {
        $html = "";
        if(is_null($this->allMessages))
            return $html;
        foreach ($this->allMessages as $message) {
            $type = $message['type'];
            $message = $message['message'];
            $html .= "<div id = 'flashMessage' class='" . $type . "'><img style = 'float:left; margin-top:10px; margin-left:20px' src ='img/flash/" . $type . ".png' alt = 'type'> <p >" . $message . "</p></div>";
        }
        $this->deleteMessages();
        return $html;
    }
    
} 