<?php
namespace CFlashTest\CFlash;

class CFlashTestClass extends \PHPUnit_Framework_TestCase
{
public function testCreateElement()
{
    $statusMessageObj = new CFlash(new FakeSession());
    $res = $statusMessageObj->isEmpty();
    $exp = true;
    $this->assertEquals($res, $exp, "Created element is created and deleted.");
}
public function testCustomMessage()
{
    $statusMessageObj = new CFlash(new FakeSession());
    $statusMessageObj->CustomMessage("Debug Meddelande!","debug");
    $res = $statusMessageObj->displayFlashMessages();
    $exp = "<div id = 'flashMessage' class='debug'><img style = 'float:left; margin-top:10px; margin-left:20px' src ='img/flash/debug.png' alt = 'type'> <p >Debug Meddelande!</p></div>";
     $this->assertEquals($res, $exp, "Debug message went wrong.");
    $statusMessageObj->deleteMessages();
    }
    
    
public function testEmpty()
{
    $statusMessageObj = new CFlash(new FakeSession());
    $res = $statusMessageObj->isEmpty();
    $exp = true;
    $this->assertEquals($res, $exp, "Something went wrong.");
    $statusMessageObj->CustomMessage("Debug meddelande!","debug");
    $res = $statusMessageObj->isEmpty();
    $exp = false;
    $this->assertEquals($res, $exp, "Something went wrong.");
}
}
class FakeSession
{
    private $sessionData = array();
    public function has($sessionVariable)
    {
        return isset($this->sessionData[$sessionVariable]);
    }
        public function set($sessionVariable, $allMessages)
    {
        $this->sessionData[$sessionVariable] = $allMessages;
    }
    
    public function get($sessionVariable)
    {
        if($this->sessionData != null && $this->sessionData[$sessionVariable] != null)
        return $this->sessionData[$sessionVariable];
        return null;
}
}