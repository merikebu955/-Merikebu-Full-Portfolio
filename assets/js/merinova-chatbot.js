document.addEventListener("DOMContentLoaded", function () {
  const openButton = document.getElementById("merinova-open");
  const closeButton = document.getElementById("merinova-close");
  const chatWindow = document.getElementById("merinova-window");
  const form = document.getElementById("merinova-chat-form");
  const input = document.getElementById("merinova-user-input");
  const messages = document.getElementById("merinova-messages");
  const status = document.getElementById("merinova-status");
  const sendButton = document.getElementById("merinova-send");

  if (!openButton || !chatWindow || !form) return;

  // Keep recent conversation for context.
  const history = [];

  openButton.addEventListener("click", function () {
    chatWindow.hidden = false;
    input.focus();
  });

  closeButton.addEventListener("click", function () {
    chatWindow.hidden = true;
  });

  function addMessage(text, sender) {
    const message = document.createElement("div");
    message.className =
      "merinova-message " +
      (sender === "user" ? "user-message" : "bot-message");

    // textContent prevents HTML/script injection.
    message.textContent = text;

    messages.appendChild(message);
    messages.scrollTop = messages.scrollHeight;
  }

  form.addEventListener("submit", async function (event) {
    event.preventDefault();

    const message = input.value.trim();

    if (!message || sendButton.disabled) return;

    addMessage(message, "user");
    history.push({ role: "user", content: message });

    input.value = "";
    sendButton.disabled = true;
    status.textContent = "MERINOVA AI is thinking...";

    try {
      const response = await fetch(
        "/Merikebu_Full_Portfolio/api/assistant.php",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            messages: history.slice(-12),
          }),
        },
      );

      const data = await response.json();

      if (!response.ok || !data.success) {
        throw new Error(data.error || "AI request failed.");
      }

      addMessage(data.reply, "bot");

      history.push({
        role: "assistant",
        content: data.reply,
      });

      // Keep the browser conversation history limited.
      if (history.length > 12) {
        history.splice(0, history.length - 12);
      }
    } catch (error) {
      addMessage(
        "Sorry, I could not connect right now. Please try again.",
        "bot",
      );
      console.error("MERINOVA AI:", error);
    } finally {
      status.textContent = "";
      sendButton.disabled = false;
      input.focus();
    }
  });
});
