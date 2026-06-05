from flask import Flask, request, jsonify
from flask_cors import CORS
from groq import Groq

app = Flask(__name__)

# ✅ CORS FIX
CORS(app, resources={r"/*": {"origins": "*"}})

# ⚠️ Your API key (OK for now, but later move to env)
client = Groq(api_key="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")


@app.route('/')
def home():
    return "Healthcare Bot Running ✅"


@app.route('/chat', methods=['GET'])
def chat():

    user_input = request.args.get('message', '').strip()

    # ✅ IMPORTANT SAFETY CHECK
    if not user_input:
        return jsonify({"reply": "No message received"})

    try:
        response = client.chat.completions.create(
            model="llama-3.1-8b-instant",
            messages=[
                {"role": "system", "content": "You are a advisor for stock market."},
                {"role": "user", "content": user_input}
            ]
        )

        reply = response.choices[0].message.content

        return jsonify({"reply": reply})

    except Exception as e:
        return jsonify({"reply": f"Server error: {str(e)}"})


if __name__ == '__main__':
    app.run(debug=True)