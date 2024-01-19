<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>{{ $data['title'] }}</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">

    <div
        style="max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <header style="text-align: center; margin: 20px auto;">
            <h1 style="color: #333;">Nota Fiscal Eletrônica</h1>
        </header>
        <section style="margin-bottom: 20px;">
            <h2 style="color: #333;">Informações da Empresa</h2>
            <p><strong>Razão Social:</strong> Petito LTDA</p>
            <p><strong>CNPJ:</strong> 11.222.333/0001-02</p>
            <p><strong>Endereço:</strong> Rua Carlos, 123 - Joinville/SC</p>
            <p><strong>Telefone:</strong> (47) 1234-5678</p>
        </section>
        <section style="margin-bottom: 20px;">
            <h2 style="color: #333;">Informações do Cliente</h2>
            <p><strong>Nome: </strong>{{ $data['nome'] }}</p>
            <p><strong>CPF: </strong>{{ $data['cpf'] }}</p>
        </section>
        <section style="margin-bottom: 20px;">
            <h2 style="color: #333;">Produtos/Serviços</h2>
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">
                            Descrição</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">
                            Quantidade</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">
                            Preço Unitário</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">
                            Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $valorTotal = 0; @endphp
                    @foreach ($data['resumeProd'] as $prod)
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $prod['name'] }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $prod['qtd'] }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">R$
                                {{ str_replace('.', ',', $prod['valorUnitario']) }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">R$
                                {{ str_replace('.', ',', $prod['total']) }}</td>
                            @php $valorTotal += $prod['total']; @endphp
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <section style="margin-bottom: 20px;">
            <h2 style="color: #333;">Informações de Pagamento</h2>
            <p><strong>Status de Pagamento: </strong> Pago</p>
            <p><strong>Hora de Pagamento: </strong> {{ date('d/m/Y H:i:s') }}</p>
            <p><strong>Meio de Pagamento: </strong> Cartão de Crédito</p>
        </section>
        <section>
            <h2 style="color: #333;">Total</h2>
            <p><strong>Total Pago: </strong>R$ {{ str_replace('.', ',', $valorTotal) }}</p>
        </section>
        <footer style="margin-top: 20px; color: #777;">
            <p>Este é um e-mail automático, não responda.</p>
        </footer>
    </div>

</body>

</html>
