const main = document.querySelector('main');

let "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";

async function groqChat(q) {
    try {
        const jsonResponse = await fetch("https://api.groq.com/openai/v1/chat/completions", {
            body: JSON.stringify({
                "model": "llama3-8b-8192",
                "messages": [{"role": "user", "content": q}],
                "temperature": 0.7
            }),
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${key}`
            }
        });

        if (!jsonResponse.ok) {
            const errorText = await jsonResponse.text();
            throw new Error(`HTTP error! status: ${jsonResponse.status}, details: ${errorText}`);
        }

        const jsonData = await jsonResponse.json();
        console.log(JSON.stringify(jsonData, null, 2));

        return jsonData.choices[0].message.content;
    } catch (error) {
        console.error('Error:', error.message);
        return `抱歉，出現錯誤：${error.message}`;
    }
}

async function chat() {
    let qNode = document.querySelector('#question');
    let responseNode = document.querySelector('#response');
    responseNode.innerText = '正在生成回覆，請稍後 ...';
    
    console.log('Sending question:', qNode.value);

    try {
        let answer = await groqChat(qNode.value);
        console.log('Received answer:', answer);
        responseNode.innerText = answer;
    } catch (error) {
        console.error('Error during chat function:', error);
        responseNode.innerText = `抱歉，出現錯誤：${error.message}`;
    }
}


