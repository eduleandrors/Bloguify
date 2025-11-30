<?php
class IAController extends Controller {

    public function revisarTexto() {

        // PEGAR TEXTO DO AJAX
        $texto = $_POST['texto'] ?? '';

        if (!$texto) {
            echo json_encode(['erro' => 'Nenhum texto enviado']);
            return;
        }

        // SUA API KEY DO GEMINI
        $apiKey = "AIzaSyBAE3sqE2dcFkAQl-SaBPr-dnDpsQhgCmw";

        // Endpoint
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=$apiKey";

        // Prompt pedindo revisão
        $prompt = "Revise gramaticalmente o seguinte texto em português (corrigir texto SOMENTE se for necessário, se não for necessário, exiba uma mensagem carinhosa dizendo que o texto está correto):
        
        TEXTO ORIGINAL:
        \"$texto\"

        Se o texto necessitou correções, responda no seguinte formato:

        [TEXTO REVISADO]
        (texto corrigido aqui)

        se não, exiba apenas a mensagem de elogio ao texto.

        ";

        $data = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ]
        ];

        // Requisição cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        $textoRevisado = $result['candidates'][0]['content']['parts'][0]['text'] ?? 'Erro ao revisar o texto';
        
        $textoRevisado = trim(str_replace('[TEXTO REVISADO]', '', $textoRevisado));

        echo json_encode([
            "revisado" => $textoRevisado,
        ]);
    }
}
