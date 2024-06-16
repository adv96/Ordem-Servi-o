<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de Serviço</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 150px;
            height: auto;
        }

        .header h1 {
            color: #0056b3;
            margin: 0;
        }

        p {
            margin: 5px 0;
        }

        strong {
            color: #0056b3;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .field {
            margin-bottom: 10px;
        }

        .field label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }

        .field span {
            display: inline-block;
            width: calc(100% - 150px);
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="header">
            <img src="image/1.png" alt="Logo da Empresa">
            <h1>Ordem de Serviço</h1>
        </div>
        <div class="field">
            <label>Cliente:</label>
            <span>{{ $cliente }}</span>
        </div>
        <div class="field">
            <label>Endereço:</label>
            <span>{{ $endereco }}</span>
        </div>
        <div class="field">
            <label>E-mail:</label>
            <span>{{ $email }}</span>
        </div>
        <div class="field">
            <label>CPF:</label>
            <span>{{ $cpf }}</span>
        </div>
        <div class="field">
            <label>Telefone:</label>
            <span>{{ $telefone }}</span>
        </div>
        <div class="field">
            <label>Serviço:</label>
            <span>{{ $servico }}</span>
        </div>
        <div class="field">
            <label>Descrição:</label>
            <span>{{ $descricao }}</span>
        </div>
        <div class="field">
            <label>Preço:</label>
            <span>R$ {{ number_format($preco, 2, ',', '.') }}</span>
        </div>
        <div class="field">
            <label>Criado em:</label>
            <span>{{ $created_at->format('d/m/Y H:i') }}</span>
        </div>
        <div class="field">
            <label>Atualizado em:</label>
            <span>{{ $updated_at->format('d/m/Y H:i') }}</span>
        </div>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} TANAMÃO System. Todos os direitos reservados.</p>
    </div>
</body>
</html>