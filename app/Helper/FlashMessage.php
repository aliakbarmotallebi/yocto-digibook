<?php namespace App\Helper;

class FlashMessage {
  private $messages = array();
  private $now = false;
  private static $instance = null;

  private function __construct() {
    // Save all messages
    if(!session()->exists('flash_messages')){
        session()->set('flash_messages', null);
    }

    $this->messages = session()->get('flash_messages');

    // Reset all flash messages or create the session
    session()->set('flash_messages', []);
  }

  // Only allows one instance of the class
  public static function instance() {
    if( self::$instance === null )
      self::$instance = new FlashMessage;
    return self::$instance;
  }
  // don't allow cloning
  private function __clone() {}

  // Allows simple message adding
  // usage: flash()->notice('You have logged in successfully');
  public function __call($name, $args) {
    $message = $args[0];
    $this->message($name, $message);
  }

  public function message($name, $message) {
    if( $this->now ) {
      $this->messages[] = array(
        'name' => $name,
        'message' => $message
      );
      $this->now = false;
    }else
      $_SESSION['flash_messages'][] = array(
        'name' => $name,
        'message' => $message
      );

  }

  public function each($callback = null) {

    // Set default markup
    if( $callback === null ) {
      $callback = function($name, $message) {
        echo '<div class="alert alert-' . $name . '">' . $message . '</div>';
      };
    }
    if(is_array($this->messages)){
        foreach( $this->messages as $flash ) {
          echo $callback($flash['name'], $flash['message']);
        }
    }
  }


  public function now() {
    $this->now = true;
    return $this;
  }

}

// flash()->message('notice', 'You have logged in successfully');
// flash()->notice('You have logged in successfully'); // same as code above
// // This will run on the next flash()->now() call
// flash()->now()->alert('Something went wrong deleting the record');
