# Projeto Clientes - PHP + SQL Server Azure

## Descrição

Aplicação PHP que conecta a um banco de dados SQL Server hospedado no Azure e lista os clientes cadastrados em uma tabela HTML com cores alternadas para facilitar a leitura.

---

## Configuração do Banco de Dados no Azure

1. **Criar o Banco de Dados SQL no Azure:**

   - Acesse o [Portal Azure](https://portal.azure.com).
   - Crie um novo recurso do tipo **Banco de Dados SQL**.
   - Defina um servidor SQL, nome do banco e configure as opções básicas.
   - Anote o **nome do servidor**, **nome do banco**, **usuário** e **senha** — serão usados na aplicação.

2. **Configurar Firewall para Permitir Conexões:**

   - No portal do Azure, vá até o servidor SQL criado.
   - Selecione a opção **Firewall e redes virtuais**.
   - Adicione o IP da sua máquina local (onde está o XAMPP) para permitir conexões.

3. **Criar a tabela `Clientes`:**

   - Conecte ao banco via Azure Data Studio, SQL Server Management Studio (SSMS) ou qualquer cliente SQL.
   - Execute o script de criação da tabela `Clientes` (disponível no repositório).

4. **Inserir os dados na tabela `Clientes`:**

   - Execute o script de inserção (sem acentos) para popular a tabela com dados fictícios.

---
## Configurando os Drivers SQLSRV para PHP 8.2 no XAMPP

1. **Baixar os Drivers Compatíveis com PHP 8.2**

   - Acesse o site oficial da Microsoft para baixar os drivers SQL Server para PHP:  
     [Microsoft Drivers para PHP para SQL Server](https://learn.microsoft.com/sql/connect/php/download-drivers-php-sql-server)
   
   - Na seção de downloads, selecione a versão **8.2** do PHP.
   
   - Escolha a versão **Thread Safe (TS)** para PHP 8.2.

   - Exemplos dos arquivos que você deve baixar:  
     `php_sqlsrv_82_ts.dll`  
     `php_pdo_sqlsrv_82_ts.dll`

   - Baixe os arquivos e extraia o conteúdo.

2. **Copiar os Arquivos para o XAMPP**

   - Copie os arquivos `.dll` baixados para a pasta de extensões do PHP no XAMPP:  
     ```
     C:\xampp\php\ext
     ```
   
   - Os arquivos que você deve copiar são:  
     - `php_sqlsrv_82_ts.dll`  
     - `php_pdo_sqlsrv_82_ts.dll`

3. **Habilitar as Extensões no php.ini**

   - Abra o arquivo `php.ini` que está localizado em:  
     ```
     C:\xampp\php\php.ini
     ```
   
   - Adicione as seguintes linhas para habilitar as extensões, caso não estejam presentes:  
     ```ini
     extension=php_sqlsrv_82_ts.dll
     extension=php_pdo_sqlsrv_82_ts.dll
     ```
   
   - Salve o arquivo.

4. **Reiniciar o Apache**

   - Abra o Painel de Controle do XAMPP.
   
   - Reinicie o Apache para que as alterações tenham efeito.

---

**Pronto!** Agora seu PHP no XAMPP está configurado para usar os drivers SQLSRV compatíveis com a versão 8.2.



---

## Executando a Aplicação PHP

1 **Configurar as variáveis de ambiente:**

   - No diretório do projeto, crie um arquivo `.env` com as variáveis:

     ```
     DB_SERVER=seu_servidor.database.windows.net
     DB_DATABASE=nome_do_banco
     DB_USERNAME=seu_usuario
     DB_PASSWORD=sua_senha
     ```

2. **Instalar dependências PHP:**

   - Execute no terminal:

     ```
     composer install
     ```

3. **Executar o servidor local:**

   - Coloque o projeto na pasta `htdocs` do XAMPP.
   - Inicie o Apache via painel do XAMPP.
   - Acesse no navegador:

     ```
     http://localhost/seu_projeto/
     ```

   - A página exibirá a tabela com os clientes carregados do banco Azure.

---

## Observações

- Verifique se as extensões do SQL Server estão corretamente habilitadas no PHP (`php.ini`).
- Garanta que a conexão com o banco Azure esteja liberada no firewall do servidor.
- Para dúvidas, consulte a documentação oficial do [Azure SQL Database](https://learn.microsoft.com/azure/azure-sql/) e do [SQLSRV PHP Driver](https://learn.microsoft.com/sql/connect/php/installation-tutorial-linux-mac).

---

