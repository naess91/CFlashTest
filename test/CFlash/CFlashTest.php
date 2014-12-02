<?php
namespace CFlashTest\CFlash;

class CFlashTestClass extends \PHPUnit_Framework_TestCase
{
public function testCreateElement()
{
    $cflash = new CFlash(new FakeSession());
    $res = $cflash->isEmpty();
    $exp = true;
    $this->assertEquals($res, $exp, "Created element is created and deleted.");
}
public function testCustomMessage()
{
    $cflash = new CFlash(new FakeSession());
    $cflash->CustomMessage("hej!","debug");
    $res = $cflash->displayFlashMessages();
    $exp = "<div id = 'flashMessage' class='debug'><img style = 'float:left; margin-top:10px; margin-left:20px' src ='img/flash/debug.png' alt = 'type'> <p >hej!</p></div>";
     $this->assertEquals($res, $exp, "Something went wrong.");
    $cflash->deleteMessages();
    }
    
    
public function testEmpty()
{
    $cflash = new CFlash(new FakeSession());
    $res = $cflash->isEmpty();
    $exp = true;
    $this->assertEquals($res, $exp, "Something went wrong.");
    $cflash->CustomMessage("hej!","debug");
    $res = $cflash->isEmpty();
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