<!DOCTYPE html>
<html lang="pt_BR">
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
            max-width: 120px;
            height: auto;
        }

        .header h1 {
            color: #F24F00;
            margin: 0;
        }

        .header h2 {
            color: black;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        p {
            margin: 5px 0;
        }

        strong {
            color: #0056b3;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-sizing: border-box;
        }

        .details {
            grid-column: span 2; /* A tabela de detalhes ocupa duas colunas */
        }

        .footer {
            grid-column: span 3; /* O rodapé ocupa todas as três colunas */
            margin-top: 15px;
            text-align: center;
            font-size: 9px;
            color: black;
        }

        .field-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .field-table th, .field-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .field-table th {
            background-color: #f2f2f2;
        }

        @media print {
            @page {
                size: A4;
                margin: 20mm;
            }
            body {
                margin: 0;
                padding: 0;
            }
            .container {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="image/1.png" alt="Logo da Empresa">
            <h1>Ordem de Serviço</h1>
            <div class="company-details">
                <h2>TANAMÃO System Ltda</h2>
                <p>Pça quinto Ruas N: 190</p>
                <p>Telefone: (33) 98710-4637</p>
                <p>Email: tanamao55@gmail.com</p>
            </div>
        </div>
        
        <div class="details">
            <table class="field-table">
                <tr>
                    <th>Cliente:</th>
                    <td>{{ $cliente }}</td>
                </tr>
                <tr>
                    <th>Endereço:</th>
                    <td>{{ $endereco }}</td>
                </tr>
                <tr>
                    <th>E-mail:</th>
                    <td>{{ $email }}</td>
                </tr>
                <tr>
                    <th>Documento:</th>
                    <td>{{ $cpf }}</td>
                </tr>
                <tr>
                    <th>Telefone:</th>
                    <td>{{ $telefone }}</td>
                </tr>
                <tr>
                    <th>Serviço:</th>
                    <td>{{ $servico }}</td>
                </tr>
                <tr>
                    <th>Descrição:</th>
                    <td>{{ $descricao }}</td>
                </tr>
                <tr>
                    <th>Quantidade de Serviços:</th>
                    <td>{{ $quantidade }}</td>
                </tr>
                <tr>
                    <th>Preço:</th>
                    <td>R$ {{ number_format($valor, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Valor Total:</th>
                    <td>R$ {{ number_format($total, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Atualizado em:</th>
                    <td>{{ $updated_at->format('d/m/Y H:i') }}</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>Assinatura do Cliente: _______________________________</p>
            <p>Assinatura do Técnico: _______________________________</p>
            <p>&copy; {{ date('Y') }} TANAMÃO System. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>
