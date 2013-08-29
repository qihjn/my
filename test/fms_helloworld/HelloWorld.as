package 
{

	import flash.display.MovieClip;

	import flash.net.Responder;

	import flash.net.NetConnection;

	import flash.events.MouseEvent;

	public class HelloWorld extends MovieClip
	{
		private var nc:NetConnection;

		private var myResponder:Responder = new Responder(onReply);

		public function HelloWorld()
		{

			textLbl.text = "";

			connectBtn.label = "Connect";

			connectBtn.addEventListener(MouseEvent.CLICK, connectHandler);

		}

		public function connectHandler(event:MouseEvent):void
		{

			if (connectBtn.label == "Connect")
			{

				trace("Connecting...");

				nc = new NetConnection();

				// 连接到服务器

				nc.connect("rtmp://127.0.0.1/HelloWorld");
				//nc.connect("rtmp://127.0.0.1/live");

				//掉用服务器端的函数 serverHelloMsg, 在 HelloWorld.asc里面.

				nc.call("serverHelloMsg", myResponder, "World");

				connectBtn.label = "Disconnect";

			}
			else
			{

				trace("Disconnecting...");

				// 断开连接

				nc.close();

				connectBtn.label = "Connect";

				textLbl.text = "";

			}

		}

		//6 定义相应函数（查看 ActionScript 3.0 语言和组件参考），用以设置label上显示的值。

		private function onReply(result:Object):void
		{

			trace("onReply received value: " + result);

			textLbl.text = String(result);

		}

	}

}