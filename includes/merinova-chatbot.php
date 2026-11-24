
<div id="merinova-chatbot">
    <button
        type="button"
        id="merinova-open"
        class="merinova-chat-open"
        aria-label="Open MERINOVA AI chatbot"
    >
        <span class="chat-robot">✦</span>
        <span>Chat with AI</span>
    </button>

    <section
        id="merinova-window"
        class="merinova-chat-window"
        aria-label="MERINOVA AI chat"
        hidden
    >
        <div class="merinova-chat-header">
            <div class="merinova-brand">
                <div class="merinova-avatar">M</div>
                <div>
                    <strong>MERINOVA AI</strong>
                    <small>AI Assistant Online</small>
                </div>
            </div>

            <button
                type="button"
                id="merinova-close"
                class="merinova-close"
                aria-label="Close chatbot"
            >×</button>
        </div>

        <div id="merinova-messages" class="merinova-messages"
             aria-live="polite">
            <div class="merinova-message bot-message">
                Hello! Welcome to MERINOVA AI.

                I can help you learn about Merikebu's portfolio,
                skills, projects and services. What would you like
                to know?
            </div>
        </div>

        <div id="merinova-status" class="merinova-status"></div>

        <form id="merinova-chat-form" class="merinova-chat-form">
            <input
                type="text"
                id="merinova-user-input"
                maxlength="4000"
                placeholder="Ask me anything..."
                autocomplete="off"
                required
            >

            <button type="submit" id="merinova-send"
                    aria-label="Send message">
                ➤
            </button>
        </form>

        <div class="merinova-chat-footer">
            Powered by OpenAI | MERINOVA TECH
        </div>
    </section>
</div>
