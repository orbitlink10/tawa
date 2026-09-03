<style>
    /* Chat widget container (hidden by default) */
    #chat-widget {
      position: fixed;
      bottom: 90px;
      right: 20px;
      width: 300px;
      max-width: 90%;
      z-index: 99999;
      font-family: Arial, sans-serif;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      border-radius: 5px;
      overflow: hidden;
      display: none;
      background: #fff;
    }

    #chat-header {
      background-color: #25D366;
      color: #fff;
      padding: 10px;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #chat-header .chat-title {
      font-size: 16px;
      font-weight: bold;
    }

    #chat-header .chat-close {
      font-size: 18px;
      cursor: pointer;
    }

    #chat-body {
      padding: 15px;
      color: #333;
      font-size: 14px;
      line-height: 1.4;
    }

    #chat-body p {
      margin: 0 0 15px;
    }

    #start-chat {
      display: block;
      text-align: center;
      padding: 10px;
      background-color: #25D366;
      color: #fff;
      text-decoration: none;
      border-radius: 3px;
      font-size: 16px;
    }

    #chat-toggle-container {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 99999;
      display: flex;
      flex-direction: column;
      align-items: center;
      pointer-events: none;
    }

    .chat-tooltip {
      background-color: #333;
      color: #fff;
      padding: 5px 10px;
      border-radius: 4px;
      font-size: 12px;
      white-space: nowrap;
      position: absolute;
      bottom: 80px;
      right: 0;
      opacity: 1;
      pointer-events: none;
    }

    #chat-toggle-button {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background-color: #25D366;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      pointer-events: auto;
    }

    #chat-toggle-button img {
      width: 30px;
      height: 30px;
    }
</style>

<!-- Chat widget -->
<div id="chat-widget">
    <div id="chat-header">
        <span class="chat-title">Chat with us on WhatsApp</span>
        <span class="chat-close" id="chat-close">&times;</span>
    </div>
    <div id="chat-body">
        <p>Hello! How can we help you today?</p>
        <a id="start-chat" href="https://wa.me/{{ get_option('whatsapp_phone') }}" target="_blank">
            Start Chat
        </a>
    </div>
</div>

<!-- Floating toggle button -->
<div id="chat-toggle-container">
    <div class="chat-tooltip">Chat with us on WhatsApp</div>
    <div id="chat-toggle-button">
        <img src="https://cdn-icons-png.flaticon.com/512/124/124034.png" alt="WhatsApp Chat">
    </div>
</div>

<script>
    (function () {
        var chatWidget = document.getElementById('chat-widget');
        var chatToggleContainer = document.getElementById('chat-toggle-container');
        var chatToggleButton = document.getElementById('chat-toggle-button');
        var chatCloseButton = document.getElementById('chat-close');

        if (!chatWidget || !chatToggleContainer || !chatToggleButton || !chatCloseButton) { return; }

        chatToggleButton.addEventListener('click', function () {
            chatWidget.style.display = 'block';
            chatToggleContainer.style.display = 'none';
        });

        chatCloseButton.addEventListener('click', function () {
            chatWidget.style.display = 'none';
            chatToggleContainer.style.display = 'flex';
        });
    })();
</script>
