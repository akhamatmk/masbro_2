
<link rel="stylesheet" type="text/css" href="{{ asset('css/chat.css')}}">

<div class="container text-center">
    <div class="row">
        <h2>Open in chat (popup-box chat-popup)</h2>
        <h4>Click Here</h4>
        <div class="round hollow text-center">
            <a href="#" id="addClass"><span class="glyphicon glyphicon-comment"></span> Open in chat </a>
        </div>
        <hr>
    </div>
</div>

<div class="popup-box chat-popup" id="qnimate">
    <div class="popup-head">
        <div class="popup-head-left pull-left"><img src="https://media.licdn.com/mpr/mpr/shrink_100_100/p/2/005/0b3/123/319cbe7.jpg" alt="pawan">Pawan Pandey</div>
        <div class="popup-head-right pull-right">
            <div class="btn-group">
                <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
                <i class="glyphicon glyphicon-cog"></i> </button>
                <ul role="menu" class="dropdown-menu pull-right">
                    <li><a href="#">Media</a></li>
                    <li><a href="#">Block</a></li>
                    <li><a href="#">Clear Chat</a></li>
                    <li><a href="#">Email Chat</a></li>
                </ul>
            </div>
            <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>
        </div>
    </div>
    <div class="popup-messages">
        <div class="direct-chat-messages">
            <div class="chat-box-single-line">
                <abbr class="timestamp">October 10th, 2013</abbr>
            </div>
            <!-- Message. Default to the left -->
            <div class="direct-chat-msg doted-border">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Sujeet</span>
                </div>
                <!-- /.direct-chat-info -->
                <img alt="message user image" src="https://media.licdn.com/mpr/mpr/shrink_100_100/p/2/005/0b3/123/319cbe7.jpg" class="direct-chat-img"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    Hey bro, how’s everything going ?
                </div>
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-timestamp pull-right">4.30 PM</span>
                </div>
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-img-reply-small pull-left">
                    </span>
                    <span class="direct-chat-reply-name">Thakur</span>
                </div>
                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
            <div class="chat-box-single-line">
                <abbr class="timestamp">October 12th, 2013</abbr>
            </div>
            <!-- Message. Default to the left -->
            <div class="direct-chat-msg doted-border">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Sujeet</span>
                </div>
                <!-- /.direct-chat-info -->
                <img alt="message user image" src="https://media.licdn.com/mpr/mpr/shrink_100_100/p/2/005/0b3/123/319cbe7.jpg" class="direct-chat-img"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    Hey bro, how’s everything going ?
                </div>
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-timestamp pull-right">4.30 PM</span>
                </div>
                <div class="direct-chat-info clearfix">
                    <img alt="" src="" class="direct-chat-img big-round">
                    <span class="direct-chat-reply-name">Thakur</span>
                </div>
                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
        </div>
    </div>
    <div class="popup-messages-footer">
        <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
        <div class="btn-footer">
            <button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>
            <button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>
            <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
            <button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> </button>
        </div>
    </div>
</div>
