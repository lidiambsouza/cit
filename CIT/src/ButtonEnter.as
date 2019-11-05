// ActionScript file
package
{
	import flash.events.KeyboardEvent;
	import flash.events.MouseEvent;
	import flash.ui.Keyboard;
  
	import mx.controls.Button;

	public class ButtonEnter extends Button {
    public function ButtonEnter() {
      super();
    }
    
    override protected function keyDownHandler(event: KeyboardEvent):void {
      if (!enabled)
        return;

      if (event.keyCode == Keyboard.SPACE || event.keyCode == Keyboard.ENTER)
        dispatchEvent(new MouseEvent(MouseEvent.CLICK));
    }
  }
}