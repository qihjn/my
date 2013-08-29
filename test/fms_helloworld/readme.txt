http://hi.baidu.com/honfei/item/b979e82e66d92bc2ee10f19d

Adobe flash media server 开发者向导[起步]

1. 起步

         Adobe flash meida server提供了一个流媒体的集合和为建立富媒体应用的群集交互模式。Flash media server提供了即时开始，实况视频流和基于用户带宽的可变的流的码率。

         Flash media server有三个版本

         Flash Media Interactive Server ：拥有完整特性的服务

         Flash Media Development Server：一个用于开发的交互式服务的版本。支持所有的特性，但是有连接数的限制。

         Flash Media Streaming Server：只支持实况和视频点播的服务。这个版本不支持服务器端的脚本或视频编码。

         注释：在使用这个向导之前最好阅读flash media server 技术一般观察


1. 1 前言

1.1.1 client-server体系结构

         Flash media server是一个网络中心，应用程序联用实时信息协议（real-time messaging protocol）连结到这个中心，这样服务器可以向连接到服务器上的很多用户发送数据并且从这些用户接受数据。一个用户通过一台配备了摄像头和麦克风，并且安装了flash player的电脑可以捕捉实况视频或音频，然后通过服务器向全世界成千上万的用户发布自己的视频或音频。全世界的用户可以参与在线游戏，并且同步所有用户的动作。

         用户通过网络连接连到服务器。一个连接类似于一个大的管道，这个管道里面传输着大量的数据流。每个流在客户端和服务器之间传输。每个服务器可以并发的处理很多连接，最大的连接数量取决于您的服务器的能力。

         一个在flash media server上运行的应用程序后一个client-server体系结构。客户端的应用程序是由adobe flash 或adobe flex开发，运行在flash player，AIR 或flash lite 3 上的。他可以捕捉和播放音频和视屏并且处理用户的交互。服务器端的应用程序运行在服务器上。它可以处理客户端的连接，向服务器的文件系统写入文件，并且处理其他的任务。

         客户端必须向服务器发起连接。一旦连接成功，客户端可以和服务器或其他客户端通信。确切的说，客户端连接到一个服务器上运行的应用程序的实例。一个应用程序的实例的例子是一个有着很多不同房间的在线游戏，用户可以组成很多不同的组群来进行游戏。在这个例子里面，每个房间就是一个确定的应用程序的实例。

         许多应用程序的实例可以同时运行。每一个应用程序的实例有自己唯一确定的名字，并且向客户端提供独一无二的资源。多个用户可以连接到同一个应用程序的实例或不同的应用程序的实例


多个客户端连接到运行与flash media server的多个应用程序（如图的scrabble和sudoku）和多个应用程序的不同实例实例（如scrabble的room2和sudoku的room1和room2）

1.1.2媒体应用程序的组成部分

         客户端的应用程序用actionscript编写并且被编译为swf文件。服务器端的应用程序是由服务器端的actionscript编写（一种类似于actionscript 1.0的语言，但是不在客户端运行，而是在服务器端运行）。一个媒体应用程序通常有已经编码好的或者实况的音频和视频，它们通过流的方式由服务器传输到客户端，由客户端传输到服务器或由服务器传输到服务器。

         一个典型的flash meida server应用程序有以下几个部分：

         客户端的用户界面：客户端的显示着用户界面，如控制视频开始，停止或暂停的按钮。用户界面可以运行在flash player，AIR 或flash lite 3 上，由adobe flash 或adobe flex开发。

         客户端的actionscrip：客户端有可以处理用户交互和连接到服务器的actionscript的代码。Flash media server3支持actionscript3.0。客户端由actionscript2.0或actionscript1.0为早期版本的Flash media serve而开发的因应用程序也是被Flash media server3兼容的。

         视频或音频：许多媒体应用程序将已经编码好的音频或视频以流的方式由服务器端传输到客户端，或由一个客户端传输到服务器端然后到其他的客户端。事先编码好的文件可能是Flash Video (FLV), MP3, 或 MP4格式的。又服务器端编码的视频总是FLV格式的，以.Flv为后缀.

         摄像头或麦克风：一个客户端可以用Adobe Flash Media Encoder或者你自己的习惯的支持实况流的flash软件向服务器实况传输音频或视频。客户通过自己的摄像头和麦克风端捕获音频或视频。

         服务器端的actionscript：许多应用程序包括封装在一个以.asc为后缀的服务器端的actionscript代码里面，通常叫他actionscript通信文件。这个文件被命名为man.asc或myApplication.asc。服务器端的脚本处理服务器端的任务，如流通传输音频和视频，定义当用户连接或断开连接时做什么。具体的请查看服务器端actionscrip语言参考。

1.1.3流格式

         Flash media server支持很多种流媒体格式，包括Flash Video (FLV), MPEG-3 (MP3), and MPEG-4 (MP4)。

1.2搭建开发环境

1.2.1安装服务

         你可以使用免费开发版的服务来开发和测试应用程序。最简单的开发环境是一台安装了flash或flex的电脑，这台电脑通同时被用作服务器。

         安装服务

         如果你需要细节介绍的话请参考Adobe Flash Media Server 安装向导。

         开启服务

         当你安装服务时，你可以设置开机自动开启服务。如果服务没有开启，你可以手动开启。

         1.点击开始，选择所有程序>adobe> Flash Media Server 3 > Start Flash Media Server 3。

         2.点击开始，选择所有程序>adobe> Flash Media Server 3 > Start Flash Media Administration Server 3。

         注释：如果你像打开管理控制台的话你需要开启Administration Server服务。

         确认服务运行

         打开控制面板>管理工具>服务。在服务窗口，确认Flash Media Administration Server 和 Flash Media Server都被开启。

1.2.2安装flash

         使用actionscript3.0开发flash用户界面，你需要flash cs3和flash player 9。

         1.下载并且安装Adobe Flash CS3 Professional。

         2.下载并且安装Flash Player 9。

         3.打开flash cs3，选择文件>发布设置。

         4.在格式栏里面确保flash和html被选中。

         5.在flash栏里面，对于版本选项，选择flash player 9。对于actionscript选项，选择actionscript3.0。


1.2.3安装flex

创建用户界面，你需要Adobe Flex Builder 或 Adobe Flex SDK和flash player 9。

         1.下载并且安装Adobe Flex 2 SDK 或 Adobe Flex Builder 2。

         2.下载并且安装Flash Player 9。

         3.在Flex Builder里面确保project> Build Automatically被选中。

  

1.3 hello world 应用程序

1.3.1前言

注释：下面的部分应用于Flash Media Interactive Server 和Flash Media Development Server者两个版本的服务。

         这个例子使用flash CS3来展示如何将一个flash文件连接到一个服务器端的脚本，别且如何从服务器获取数据。在这个例子里面，flash用户界面有一个按钮（connect）和一个lebel(最初是空的)。当一个用户点击connect按钮，客户端连接到服务器；然后客户端运行服务器端的函数来返回一个字符串的值。当服务器端回应了，客户端的回应函数在label上显示字符传。客户端通过改变按钮的label来断开连接。当diaconnect的按钮被点击，客户端断开连接，并且清空label。

范例文件在HelloWorld文件夹下。

1.3.2创建用户界面

         1.开启Flash CS3，然后选择新建>flash文件（ActionScript 3.0）。

         2.在文档类的框框里面写上HelloWorld。你可能看见一个关于威定义的actionscript类警告信息。点及ok,因为你将添加类文件在下一节。

3.选择窗口>组件，然后选择User Interface>Button。在属性栏里面为按钮取名connectBtn。4.添加一个Label组件，移动它到按钮上面，取名为textLbl。

保存文件为HelloWorld.fla。

1.3.3编写客户端脚本

这个脚本定义了两个按钮动作，一个是连接到服务器，另一个是从服务器断开。当连到服务器，这个脚本或调用服务器端的一个函数传入参数（”world”），这将引发一个相应来显示返回的字符串（”hello world”）。

1.选择文件>新建>actionscript文件。检查目的路径有HelloWorld.fla。

2.声明包和导入需要的类；

package {   

    import flash.display.MovieClip;

    import flash.net.Responder;

    import flash.net.NetConnection;

    import flash.events.MouseEvent;

    public class HelloWorld extends MovieClip {

    }

}

3.为连接和相应服务器事件申明变量（查看 ActionScript 3.0 语言和组件参考）

private var nc:NetConnection;

private var myResponder:Responder = new Responder(onReply);

4.定义类的构造函数。设置label和button的显示的值，为button添加事件侦听器

public function HelloWorld() {

    textLbl.text = "";

    connectBtn.label = "Connect";

    connectBtn.addEventListener(MouseEvent.CLICK, connectHandler);

}

5.基于按钮当前的label定义侦听函数

public function connectHandler(event:MouseEvent):void {

        if (connectBtn.label == "Connect") {

            trace("Connecting...");

            nc = new NetConnection();

            // 连接到服务器

            nc.connect("rtmp://localhost/HelloWorld");

            //掉用服务器端的函数 serverHelloMsg, 在 HelloWorld.asc里面.

            nc.call("serverHelloMsg", myResponder, "World");

            connectBtn.label = "Disconnect";               

        } else {           

            trace("Disconnecting...");

            // 断开连接

            nc.close();

            connectBtn.label = "Connect";

            textLbl.text = "";

        }

}

6 定义相应函数（查看 ActionScript 3.0 语言和组件参考），用以设置label上显示的值。

private function onReply(result:Object):void {

    trace("onReply received value: " + result);

    textLbl.text = String(result);

}

7.保存文件HelloWorld.as。

我的学习：这里接触到了到了新的类Responder类和NetConnetction，以前没用到过。

NetConnection这个类在 Flash Player 和 Flash Media Server 应用程序之间或者 Flash Player 和运行 Flash Remoting 的应用程序服务器之间创建双向连接。 NetConnection 对象如同客户端与服务器之间的管道。 可使用 NetStream 对象通过此管道发送流。在call

方法中的一个参数要用到Responder的对象，call方法第一个参数是在服务器端的一个函数名，第二给是Responder对象，用来处理通信的一些状态，后面的就是调用服务器端函数的要传入的参数。Responder的构造函数里面有两个Function类型的参数

result:Function — 如果对服务器的调用成功并返回结果，则此函数被调用。status:Function (default = null) — 如果服务器返回一个错误，则此函数被调用。者两个函数在程序里面来实现，貌似result的参数就是服务器函数的返回值，由与帮助里面没找到，猜测是这样的。

  

1.3.4编写服务器端脚本

         1.选择文件>新建>actionscript通信文件。

         2.定义服务器端函数和连接的逻辑：

application.onConnect = function( client ) {

    client.serverHelloMsg = function( helloStr ) {

        return "Hello, " + helloStr + "!";

    }

    application.acceptConnection( client );

}

         3.在RootInstall/application的文件夹下创建一个叫HelloWorld的文件夹。

         4.把HelloWorld.asc文件保存在RootInstall/application/HelloWorld文件夹里面。

1.3.5编译和运行应用程序

         1.确认服务正在运行

         2.选择HelloWorld.fla文件中的菜单栏。

         3.选择控制>测试影片

         4.点击Connect按钮，Label上就显示了”Hello World!”,然后按钮上的文字就变成了Disconnect。

         5.点击Disconnect按钮，Trace（）语句执行，输出面板里面显示了相关内容。

1.4创建一个应用程序

1.4.1编写客户端代码

         一个客户端用actionscript编码来连接到服务器，处理事件，和做其它工作。通过flash CS3你可以使用actionscript 3.0,2.0或1.0，但是actionscript3.0提供更多特性。要想使用flex，你必须使用actionscript 3.0.

         Actionscript3.0显著的不同于actionscript 2.0。这个向导假设你是在正在编写actionscript 3.0的类，这些类是一些外部的.as文件，有符合你的开发环境的目录结构的包的名称。

         在flash里面创建一个actionscript 3.0的类

         1.如果actionscript文件和FLA文件在同一个目录下，包名是不需要的：

package {

}

         2.如果你将文件保存在FLA的子目录下，包名必须匹配.as文件的路径，比如：

package com.examples {

}

         3.加入到粗语句和类声明：

package {

    import flash.display.MovieClip;

    public class MyClass extends MovieClip {

    }

}

类名需要和文件名相同而不管.as文件的扩展。你的类可能导入或者扩展了其他的actionscript3.0的类，比如MovieClip。

         在Flex里面创建actionscript3.0的类

         1.开启adobe flex builder。

         2.创建一个新的Project。选择File>New>Actionscript Project然后跟随向导。如果你创建了一个actionscript项目，一个已经被声明了包名和类名的actionscript3.0的文件就被打开：

package {

    import flash.display.Sprite;

    public class Test extends Sprite

    {

        public function TestAs()

        {

        }

    }

}

3.（可选）如果你创建一个Flex Project ，选择File>New>ActionScript Class。

1.4.2编写服务器端代码

         通常来说，如果应用程序需要做一下任何的事情，就需要由服务器端的actionscript编写的服务器端代码。

         客户端认证：通过用户名和密码，或者存储在应用程序或数据库里面的信用凭证来进行客户端的认证。

         实现连接逻辑：当客户端连接或断开连接时做出反应来实现连接的逻辑。

         更新客户端：通过调用远端客户端的方法或更新shared objects来影响所有的连接到服务器的客户端来跟新客户端。

         处理流：同过允许你播放，录音和管理传入和传出服务器的流来进行流的处理。

         连接到其他的服务器：通过调用网络服务或创建简介到一个服务器应用程序或数据库的网络套接字来连接到其他的服务器。

         扩展服务：通过使用获取，授权或文件改编来扩展服务。

        

         将你的服务器端代码放到一个名为main.asc或yourApplicationName.asc的文件里面yourApplicationName就是你的已经在flash media interactive server里注册的应用程序名字。

要在服务器上注册一个应用程序，在RootInstall/applications文件夹下创建一个以应用程序的名字命名的文件夹就可以了。例如，要注册一个名为skatingClips的应用程序，就创建文件夹RootInstall/applications/skatingClips即可。服务器端的代码就放在skatingClips 文件夹下的main.asc 或 skatingClips.asc文件里面。

         要配置application路径的位置，需要编辑fms.ini 或 Vhost.xml配置文件。具体的查看Adobe Flash Media Server配置和管理向导。

         服务器端的代码放在application目录下或它的script的子目录下，例如你可以使用下面的任意的路径：

RootInstall/applications/sudoku

RootInstall/applications/sudoku/scripts        

1.4.2.1Client和application对象

         服务器端的脚本有权使用两个对象：Client对象和application对象。当一个客户端简介到一个在flash media server上的应用程序时。服务器创建了一个服务器端的Client类的实例来代表客户端。一个应用程序可以被成千上万的客户端连接。在你的服务器端的代码中，你可以使用Client对象来和独立的客户端发送和接受数据。

         每一个应用程序也有一个单独的application对象，application对象是一个服务器端的Application类的一个实例。application对象代表了应用程序的实例，你可以使用他来接受客户端的连接请求，断开客户端的连接，关闭应用程序等诸如此类的事情。

1.4.2.2编写双字节的应用程序

         如果你使用双字节的文本（如亚洲的字集）来编写服务器端的asctionscript脚本，那么请用UTF-8的编码来编写。这个意味着你需要一个JavaScript的编辑器如Flash 或 Dreamweaver里面的脚本窗口，他们将文件编码为UTF-8标准。然后你可以使用内置的Javascript方法如Date.toLocaleString()方法来将字符串转换到系统的本地编码。

         有些简单的文件编辑器可能不会将文件编码为UTF-8便准，然而有些编辑器，如微软的Windows XP 和 Windows 2000中的记事本提供了将文件另存为UTF-8标准的选项。

在Dreamweaver中设置为UTF-8编码

         1.检查文件的编码设置，选择修改>页面属性,然后文件编码，选择Unicode（UTF-8）。

         2.改变内置输入设置，选择编辑>首选参数（windows）或Dreamweaver>首选参数（Mac），然后点击常规，选择允许双字节内联输入。

使用双字节作为方法名

         使用对象数组的操作符而不要用点操作符来标记方法名，如：

// 这是正确的使用双字节字符来标记方法名的方法

obj["Any_hi_byte_name"] = function(){}

//这是不正确的使用双字节字符来标记方法名的方法.

obj.Any_hi_byte_name = function() {}

1.5测试应用程序

1.5.1测试和调试服务器端脚本

         要测试一个服务器端的脚本，使用trace（）语句在显示器上显示每个过程点

         使用管理控制台来开始，停止，重载和查看应用程序采用一下方法：开始>所有程序> Adobe Flash Media Server 3 > Flash Media Administration Console.

         注释：当你编辑和保存一个.asc文件时，只有应用程序重新开始后才会产生影响。如果应用程序已经运行，使用管理控制台关闭它，谈后再次连接这个应用程序。
        

         对于每个应用程序的实例而言，你可以检查他的实况记录，客户端和shared objects，如果需要的话，还可以检查正在使用的流和运行状态。

         下面是一个检查正在运行的应用程序的运行表现的例子

查看服务器端脚本的输出

main.asc文件里面trace（）语句输出的内用被发送到一个日志文件里面，典型的如下

RootInstall/logs/_defaultVHost_/yourApplicationName/yourInstanceName/application.xx.log

yourApplicationName是默认的，XX是实例的数字，00值最近用到的日志，01是上一个实例，以此类推。

         你可以通过任何的文件编辑器来查看日志

         当一个应用程序正在运行，你可以在管理控制台里面看它的实况日志：

         1.在window桌面，点击开始>所有程序> Adobe Flash Media Server 3 > Flash Media Administration Console。

         2当管理控制台打开了，点击View Applications, 然后Live Logs.

1.5.1.1使用管理控制台调试

         调式会话的可用性和数量是在Application.xml文件里面的AllowDebugDefault 和MaxPendingDebugConnections 这两个参数决定的。默认的，调式是不被允许的。要知道更多的细节，查看Adobe Flash Media Server 配置和管理向导。

         你可以添加下面的代码来重写调式设置

Application.allowDebug = true;

注释：如果使用了这个代码，在最后配置应用程序是将它改成false

开始调式会话：

1.开启Flash Media Server 和 Flash Media Administration Server。

2.开启管理控制台。

3.使用安装是设置的用户名和密码登陆管理服务器。

4.在flash media server上开始你的应用程序。

5.在管理控制台中的调式列表中选择应用程序。

6.如果需要的话，点击stream按钮来查看正在播放的流的列表。

7.点击其中的一个流。

8.点击播放流的按钮。

9一个弹出窗口被打开，然后流被播放。

10.如果需要的话，点击Shared Objects按钮来查看应用程序的Shared Objects。

11，点击一个Shared Objects。

12，点击close debug按钮来结束调式会话。

1.5.2测试和调试客户端脚本

         要测试客户端的脚本，使用trace()语句将每个过程点显示在显示器上。在flash CS3的窗口>输出面板里面会显示结果（这里以Hello World的应用程序为例）：

         要调试客户端的脚本，使用Flash Cs3里面的调试菜单来设置断点，跟踪函数等诸如此类的事情，你可以在窗口>调试面板中检查脚本的状态。

1.6配置一个应用程序

1.6.1复制服务器端文件使起在Flash media server上生效

连接到flash media server上的应用程序必须在服务器上注册，这样服务器就能知道那些试图连接的人是谁。要在服务器上注册一个应用程序，在主应用程序的文件夹下创建一个对应与这个应用程序的文件夹，默认的主应用程序的文件夹是在Flash Media Server 3/applications，要创建一个应用程序的实例，在这个应用长须的文件夹下创建一个字文件夹（例如Flash Media Server 3/applications/exampleApplication/instance1）。把服务器端的脚本复制到服务器的applicatiuon目录下使其生效：

RootInstall/applications/YourApplicationName

RootInstall/applications/YourApplicationName/scripts

RootInstall/applications/YourApplicationName/YourInstanceName/

RootInstall/applications/YourApplicationName/streams/YourInstanceName/

默认的，当一个应用程序被请求时flash media server检查上述的目录。

注释：要移动一个正在运行的应用程序，将文件复制到新的位置，然后在管理控制台中重启这个应用程序。

         例如，要运行在RootInstall/documentation/samples目录下的Stream的范例，首先，你需要将Streams文件夹复制到application目录，如下RootInstall/applications/Streams。要运行StreamLength的范例，需要将StreamLength文件夹复制到application目录，如下RootInstall/applications/StreamLength。确保文件爱你加包含main.asc文件和streams子文件夹。（as和Fla是源文件，不需要在这些目录里面，swf文件可以在任何地方运行）。  

1.6.1.1打包服务端的文件

         Flash media server 包括一个命令行文档编译器---far.exe，这个使你可以将服务器端的脚本打包到一个FAR文件里面，FAR文件使一个档案文件就像一个ZIP文件，用来简化配置。你也可以使用文档编译器来将服务器端脚本编译到字节码（扩展名为.ase的文件）来加速请求加载一个应用程序实例的时间。

         一个打的应用程序会包含很多个存储在不同地方的服务器端脚本文件。一些文件在应用程序的目录下，另一些被分散在服务器配置文件定义的脚本库路径里面。简化你的媒体应用程序的开发，你可以将你的服务器端的JS，asc，ase文件打包在一个自己包含的flash media server文档文件（FAR文件）。

FAR文件使一个包含主要的脚本文件（可以是main.js, main.asc, main.ase, applicationName.js, applicationName.asc, or applicationName.ase文件）和主要脚本文件关联到的其他的脚本文件。

         运行文档编译器来创建脚本包的语法如下：

c:\> far -package -archive <archive> -files <file1> [<file2> ... <fileN>]

下表描述了可用的打包FAR 文件的命令行的操作

操作符

描述

-archive archive

制定档案文件的名字有.far后缀名

-files file1 [ file2 ... fileN ]

制定要包含在档案文件里面的文件列表. 致少有一个文件。

注释：如果主要脚本关联到的其他脚本在子目录下，在文档文件里面必须包含层级关系。要实现层级关系，Adobe建议你在主要脚本的目录里面运行FAR。

1.6.2复制客户端文件到一个网络服务器

         将SWF文件复制到网络上的服务器。